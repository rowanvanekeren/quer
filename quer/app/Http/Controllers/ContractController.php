<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Contracts;
use App\Events;
use App\Advertisements;
use Auth;

class ContractController extends Controller
{
    //
    public function get_contracts_overview()
    {
        $quer_contracts = $this->get_quer_contracts_overview();
        $applicant_contracts = $this->get_applicant_contracts_overview();
        return view('contracts_overview', ['quer_contracts' => $quer_contracts, 'applicant_contracts' => $applicant_contracts]);
    }


    public function get_quer_contracts_overview()
    {
        //get all contracts where you are the quer and where the phase_nr >= 10 (at least agreement)
        $contracts = Contracts::with('advertisements')->with('phases')->where('quer_id', Auth::user()->id)->where('phase_id', '>', 2)->get();
        //dd($contracts);
        $total_contracts = [];
        
        foreach ($contracts as $contract) {
             
             $event = Events::find($contract->advertisements->event_id);
             
             $total_contract = (object)['contract' => $contract, 'event' => $event];

             array_push($total_contracts, $total_contract);
         }
        
        return $total_contracts;
    }

    public function get_applicant_contracts_overview()
    {
        //get all contracts where you are the applicant and where the phase_nr >= 10 (at least agreement)
        $contracts = Contracts::with('advertisements')->with('phases')->where('applicant_id', Auth::user()->id)->where('phase_id', '>', 2)->get();
        
        $total_contracts = [];
        
        foreach ($contracts as $contract) {
             
             $event = Events::find($contract->advertisements->event_id);
             
             $total_contract = (object)['contract' => $contract, 'event' => $event];

             array_push($total_contracts, $total_contract);
         }
        
        return $total_contracts;
        
        return $contracts;
    }
    
    
    
    
    //overview of contracts "in anticipation"
    public function get_quers_overview($id_advert)
    {
        //get event info
        $event = Events::with('advertisements')->has('advertisements')->whereHas('advertisements', function ($query) use ($id_advert) {
             $query->where('id', '=', $id_advert);
         })->first();
        
        //$contracts = Contracts::where('advertisement_id', $id_advert)->where('phase_id', 1)->get();
        //$contracts2 = Contracts::with('user')->where('advertisement_id', $id_advert)->get();
        
        $quers = User::with('contracts_quer')->has('contracts_quer')->whereHas('contracts_quer', function ($query) use ($id_advert) {
             $query->where('advertisement_id', $id_advert)->where('phase_id', 1);
         })->get();
        
        
        //$quers2 = User::with('contracts_quer')->join('contracts', 'contracts.quer_id', '=', 'users.id')->where('contracts.advertisement_id', 4)->get();
        
        $quers_info = [];
        
        foreach ($quers as $quer) {
            $contracts = Contracts::where('advertisement_id', $id_advert)->where('quer_id', $quer->id)->where('phase_id', 1)->get();
            $quer_and_contract = (object)['quer' => $quer, 'contract' => $contracts[0]];
            array_push($quers_info, $quer_and_contract);
        }
        return view('quers_overview', ['event' => $event, 'quers' => $quers_info]);
    }
    
    
    
    public function get_contract_details($id)
    {
        //
        //$contract = Contracts::find($id);
        //only fetch this is the contract has been agreed on (phase_id > 2)
        $contract = Contracts::with('phases')->has('phases')->with('advertisements')->where('phase_id', '>', 2)->where('id', $id)->first();
        //dd($contract);
        $event = Events::find($contract->advertisements->event_id);
        //dd($event);
        if($contract) {
            $quer = User::find($contract->quer_id);
            $applicant = User::find($contract->applicant_id);
            //$advert = Advertisements::find($contract->advertisement_id);
            return view('contract_details', ['contract' => $contract, 'event' => $event, 'quer' => $quer, 'applicant' => $applicant]);
        }
        else {
            //for now -> should be changed into some kind of error / flash message
            return view('dashboard');
        }
    }
    
    
    
    
    
    
    //this function will be called every time someone offers to be a quer
    function store_new_contract(Request $request)
    {
        //dd($request);
        //default a contract always starts with phase 1 aka in_anticipation
        $phase = 1;
        $active = 1;
        
        $contract = new Contracts([
            'quer_id' => $request->quer_id,
            'applicant_id' => $request->applicant_id,
            'price' => $request->fee,
            'phase_id' => $phase,
            'advertisement_id' => $request->advertisement_id,
            'active' => $active,
        ]);

        $contract->save();

        return redirect('/dashboard');
    }
    
    
    
    
    public function update_contracts($id_contract)
    {
        //the contract that is passed through parameters should be updated to phase agreement
        //the other contracts with same $advertisment_id and same $applicant_id should be updated to phase cancelled

        $contract_agreed = Contracts::find($id_contract);

        //contract agreed gets phase_id = 3, which means agreement
        $contract_agreed->phase_id = 3;


        $contract_agreed->save();

        //fetch all other contracts on the same advertisement (the agreed contract (above) should not be fetched)
        $other_contracts = Contracts::where('advertisement_id', $contract_agreed->advertisement_id)->where('applicant_id', $contract_agreed->applicant_id)->where('id', '!=', $id_contract)->get();

        foreach ($other_contracts as $cancelled_contract) {
            //all the other events get phase_id = 2, which means cancelled
            $cancelled_contract->phase_id = 2;
            $cancelled_contract->save();
        }

        //a function like soft_delete_advert should be called here
        $advertisement = Advertisements::find($contract_agreed->advertisement_id);
        $advertisement->active = 0;
        $advertisement->save();


        //dd($contract_agreed, $other_contracts, $advertisement);

        return redirect('/contracts_overview')->with('msg', "Que'r succesvol gekozen.  Bekijk hier je contract");

    }
    
    
    public function upload_ticket(Request $request) {
        //
        
        $contract = Contracts::find($request->contract_id);
        
        //upload image and add filename to contracts attachement column
        $destinationPath = base_path() . "/public/uploads";
        if (isset($request->ticket)) {
            if ($request->file('ticket')->isValid()) {
                
                $fileName = date('d-m-Y') . '_' . $request->ticket->getClientOriginalName();

                $request->file('ticket')->move($destinationPath, $fileName);

                $contract->attachment = $fileName;
                $contract->save();
            }
        }
        
        
        //update contract phase (4 = transfer)
        $this->update_contract_phase($request->contract_id, 4);
        return redirect('/contract_details/'.$request->contract_id)->with('msg', "Je ticket werd succesvol toegevoegd!");
    }
    
    public function download_ticket( $id ) {
        //
        
        $contract = Contracts::find($id);
        //dd($contract->attachment);
        
        $file= base_path() . "/public/uploads/" . $contract->attachment;
        //dd($file);
        $headers = array(
                  'Content-Type: application/pdf',
                );
        
        $this->update_contract_phase($id, 5);
        
        return response()->download($file, $contract->attachment, $headers);
    }
    
    public function accept_ticket(Request $request) {
        //update contract phase with phase id = 6 (= acceptance applicant)
        update_contracts_phase($request->contract_id, 6);
        return redirect('/contract_details/'.$request->contract_id)->with('msg', "Ticket geaccepteerd! Dankjewel en veel plezier met je tickets!");
    }
    
    
    //this function should be called when uploading a ticket as well as when accepting the ticket
    public function update_contract_phase ($contract_id, $phase_id)
    {
        //
        $contract = Contracts::find($contract_id);
        
        $contract->phase_id = $phase_id;
        
        
        $contract->save();
        
    }

    
    
    
}
