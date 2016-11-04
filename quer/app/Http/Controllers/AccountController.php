<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

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
    
    
    function update_account(Request $request){
        
        $user = User::find(Auth::user()->id);
        
        //check whether a new image was uploaded, if not keep previous imagepath
        if ($request->hasFile('image')) {
            $destinationPath =  base_path() . "/public/images/profiles";
            if ($request->file('image')->isValid()){
                $ext = pathinfo($request->image->getClientOriginalName(), PATHINFO_EXTENSION);
                $imageName = date('d-m-Y') . '_' . $request->username . '.' . $ext;
                $request->file('image')->move($destinationPath,$imageName);
                $user->image = $imageName;
            }
        }
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->street = $request->username;
        $user->house_number = $request->house_number;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        
        $user->save();
        return redirect('/dashboard');
        
    }
    
}
