<?php

namespace App\Http\Controllers;

use App\Events;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //
    
    
    
    
    
    
    
    
    //load views
    
    
    public function add_advertisement ($id) {
        //$event = Event::where('project_id', $id)->get();
        if($id) {
            $event = Events::find($id);
            //dd($event);
            return view('add_advertisement', ['event' => $event]);
        }
        else {
            return view('add_advertisement');
        }
        
        
    }
    
    
    
}
