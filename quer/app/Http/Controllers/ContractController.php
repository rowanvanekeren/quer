<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Contracts;
use App\Events;
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
        $contracts = Contracts::where('quer_id', Auth::user()->id)->where('phase_id', '>', 2)->get();
        return $contracts;

    }

    public function get_applicant_contracts_overview()
    {
        //get all contracts where you are the applicant and where the phase_nr >= 10 (at least agreement)
        $contracts = Contracts::where('applicant_id', Auth::user()->id)->where('phase_id', '>', 2)->get();
        return $contracts;
    }
    
    
    
    
    //overview of contracts "in anticipation"
    public function get_quers_overview($id_advert)
    {
        //
        
        $event = Events::with('advertisements')->has('advertisements')->whereHas('advertisements', function ($query) use ($id_advert) {
             $query->where('id', '=', $id_advert);
         })->first();
        
        $contracts = Contracts::where('advertisement_id', $id_advert)->where('phase_id', 1)->get();
        
        /*
        $contracts2 = Contracts::with('user')->has('user')->whereHas('user', function ($query) {
             $query->where('user_id', '=', 3);
         })->get();*/
        
        $quers = User::with('contracts_quer')->has('contracts_quer')->whereHas('contracts_quer', function ($query) use ($id_advert) {
             $query->where('advertisement_id', $id_advert)->where('phase_id', 1);
         })->get();
        
        dd($quers);
        
        
        dd($event, $quers, $contracts);
        

        return view('quers_overview', ['event' => $event, 'quers' => $quers]);
    }
    
    
}
