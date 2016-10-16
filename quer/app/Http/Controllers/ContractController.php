<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Contracts;
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
    
}
