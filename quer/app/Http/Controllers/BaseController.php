<?php

namespace App\Http\Controllers;

use Auth;
use App\Events;
use App\Advertisements;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //
    
    
    
    
    
    
    
    
    //load views
    
    
    public function my_advertisements() {
        //my_advertisements = an array that contains the advertisement info + corresponding event info
        $my_advertisements = [];
        
        //get all advertisements from user with given id (eventueel nog ne order by erbij zetten)
        $advertisements = Advertisements::where('user_id', Auth::user()->id)->get();
        //dd($advertisements);
        
        foreach($advertisements as $advertisement) {
            //
            $event_info = Events::where('id', $advertisement->event_id)->get();
            
            $my_advertisement = {};
            
            $my_advertisement.advertisement = "test";
            
            //$my_advertisement = {'advertisement' => $advertisement, 'event' => $event_info};
            dd($my_advertisement.test);
            array_push($my_advertisements, $my_advertisement);
        }
        
        return view('my_advertisements', ['advertisements' => $my_advertisements]);
    }
    
    
    
    public function add_advertisement ($id = null) {
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
    
    
    
    
    //store new advertisements
    public function store_new_advertisement(Request $request)
    {
        //dd($request);
        //check whether there was an event id
            //yes --> create new advertisement
            //no --> first create new event and then create new advertisement with event_id of the newly created event
        
        if($request->event_id) {
            //store advertisement
            $event_id = $request->event_id;
            //echo("advertisement created from existing event");
            //echo($request->event_id . " " . $request->name);
        }
        
        else {
            //create new event
            /*$event = new Events(['name' => $request->name,
                                 'description' $request->description
                                ]);
            
            $event->save();*/
            
            //get id of this new event
            //$event_id = $event->id;
            //echo("advertisement created from blanco advertisment form");
            //echo($request->private_description . " " . $request->name);
        }
        
        
        
        $advertisement = new Advertisements(['user_id' => $request->user_id,
                                             'event_id' => $event_id,
                                             'private_description' => $request->private_description,
                                             'price' => $request->price
                            ]);
        
        $advertisement->save();
        
        //dd($advertisement);
        
        //hier moet de redirect wel nog staan, want indien het valideren en inserten lukt, gaat hij niet automatisch redirecten
        return redirect('/my_advertisements');
    }
    
    
    
    
}
