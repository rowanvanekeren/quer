<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    //
    
    
    
    function edit_account() {
        //return form with current values
        return view('edit_account');
        
    }
    
    
    function update_account(){
        //
        
        
        $user = User::find(Auth::user()->id);
        
        //check whether a new image was uploaded, if not keep previous imagepath
        //$imagepath = 
        if ($request->hasFile('image')) {
            //
        }
        
        if($request->street == "") {
            $street = $request->street_old;
        }
        else {
            $street = $request->street;
        }
        
        //aangezien we nummer niet meer gaan gebruiken, maar het hele adres in street steken, gaan we house_number gewoon standaard op 1 zetten
        $house_number = 1;
        
        $project->name = $request->name;
        $project->description = $request->description;
        $project->startdate = $request->startdate;
        $project->hidden = $hidden;
        $project->imagepath = $imagepath;
        $project->street = $street;
        $project->house_number = $house_number;
        $project->latitude = $request->latitude;
        $project->longitude = $request->longitude;
        $project->user_id = $request->user;
        
        $project->save();
        
        
    }
    
}
