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
    
    
    public function add_advertisement ($id = null)
    {
        //$event = Event::where('project_id', $id)->get();
        if ($id) {
            $event = Events::find($id);
            //dd($event);
            return view('add_advertisement', ['event' => $event]);
        } else {
            return view('add_advertisement');
        }


    }
    
    
    
    
    //store new advertisements
    public function store_new_advertisement(Request $request)
    {
        dd($request);
        //check whether there was an event id
            //yes --> create new advertisement
            //no --> first create new event and then create new advertisement with event_id of the newly created event
        
        if($request->event_id) {
            //store advertisement
            $event_id = $request->event_id;
        }
        
        else {
            //create new event
            /*$event = new Events(['name' => $request->name,
                                 'description' $request->description
                                ]);
            
            $event->save();*/
            
            //get id of this new event
            $event_id = $event->id;
            
        }
        
        
        /*
        $advertisement = new Advertisements(['name' => $request->name,
                                             'user_id' => $request->user_id,
                                             'event_id' => $event_id,
                                             'private_description' => $request->private_description
                            ]);
        
        $advertisement->save();
        */
        
        //hier moet de redirect wel nog staan, want indien het valideren en inserten lukt, gaat hij niet automatisch redirecten
        return redirect('/my_advertisements');
    }

    public function add_event () {

            return view('add_event');

    }
    
    
    
    
}
