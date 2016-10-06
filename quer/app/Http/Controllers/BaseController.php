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
    
    



    //returns advertisements created by the authenticated user
    public function my_advertisements() {
        //my_advertisements = an array that contains the advertisement info + corresponding event info
        $my_advertisements = [];
        
        //get all advertisements from user with given id (eventueel nog ne order by erbij zetten)
        $advertisements = Advertisements::where('user_id', Auth::user()->id)->get();
        //dd($advertisements);
        
        foreach($advertisements as $advertisement) {
            
            $event_info = Events::where('id', $advertisement->event_id)->get();
            $event_info = $event_info[0];
            $my_advertisement = (object) ['advertisement' => $advertisement, 'event' => $event_info];
            
            array_push($my_advertisements, $my_advertisement);
        }
        //dd($my_advertisements);
        return view('my_advertisements', ['advertisements' => $my_advertisements]);
    }
    
    
    
    public function add_advertisement ($id = null) {

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
        //dd($request);
        //check whether there was an event id
            //yes --> create new advertisement
            //no --> first create new event and then create new advertisement with event_id of the newly created event
        
        if($request->event_id) {
            //store advertisement
            $event_id = $request->event_id;
            echo("advertisement created from existing event");
            //echo($request->event_id . " " . $request->name);
        }
        
        else {
            //create new event (with existing function)
            echo("advertisement created from blanco");
            $event_id = $this->store_new_event($request);
            
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

    public function add_event () {

            return view('add_event');

    }

    public function store_new_event (Request $request) {
        //code for if admin event or user event
        $code = 0;
        $category = 0;

        $startdatetime = $request->startdate. " " . $request->starttime;
        $eventdatetime = $request->eventdate. " " . $request->eventtime;



        $event = new Events([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'city' => $request->city,
            'url' => $request->url,
            'date_start_sell' => $startdatetime,
            'date_event' => $eventdatetime,
            'image' => $request->image,
            'categorie_id' => $category,
            'code' => $code,

        ]);

        $event->save();

        $destinationPath =  base_path() . "/public/images/events";
        if(isset($request->image)){
            if ($request->file('image')->isValid()){
                $ext = pathinfo($request->image->getClientOriginalName(), PATHINFO_EXTENSION);
                $imageName = date('d-m-Y') . '_' . $event->id . '.' . $ext;
                /*   App::abort(500, 'Error');*/

                $request->file('image')->move($destinationPath,$imageName);

                $event->image = $imageName;
                $event->save();
            }
        }

        if(Auth::user()->is_admin == 0)
        {

            return $event->id;
        }else if(Auth::user()->is_admin == 1){
            $event->code = 1;
            $event->save();
            return redirect('/my_advertisements');
        }

    }
    
    
    
    
}
