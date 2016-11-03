<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Events;
use Auth;

class EventController extends Controller
{
    //
    
    
    
    public function add_event()
    {
        $events = Events::all();
        return view('add_event',['events' => $events]);
    }
    
    
    
    public function store_new_event(Request $request)
    {
        //code for if admin event or user event
        $code = 0;
        //event is active by default
        $active = 1;

        $startdatetime = $request->startdate . " " . $request->starttime;
        $eventdatetime = $request->eventdate . " " . $request->eventtime;

        $event = new Events([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'city' => $request->city,
            'url' => $request->url,
            'date_start_sell' => $startdatetime,
            'date_event' => $eventdatetime,
            'image' => $request->image,
            'tags' => $request->tags,
            'categorie_id' => $request->category,
            'code' => $code,
            'active' => $active,

        ]);

        $event->save();


        $destinationPath = base_path() . "/public/images/events";
        if (isset($request->image)) {
            if ($request->file('image')->isValid()) {
                $ext = pathinfo($request->image->getClientOriginalName(), PATHINFO_EXTENSION);
                $imageName = date('d-m-Y') . '_' . $event->id . '.' . $ext;
                /*   App::abort(500, 'Error');*/

                $request->file('image')->move($destinationPath, $imageName);

                $event->image = $imageName;
                $event->save();
            }
        }



        if (Auth::user()->is_admin == 0) {
            return redirect('/add_advertisement/' . $event->id);

        } else if (Auth::user()->is_admin == 1) {
            $event->code = 1;
            $event->save();
            return redirect('/my_advertisements');
        }

    }


    
}
