<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Advertisements;
use App\User;
use App\Events;
use Auth;
use App\Contracts;

class AdvertisementController extends Controller
{
       public function my_advertisements()
     {
         //my_advertisements = an array that contains the advertisement info + corresponding event info
         $my_advertisements = [];

         //get all advertisements from user with given id (eventueel nog ne order by erbij zetten)
       /*  $advertisements = Advertisements::where('user_id', Auth::user()->id)->get();
         $advertisements = Events::with('advertisements')->has('advertisements')->whereHas('advertisements', function ($query) {
             $query->where('user_id', '=', Auth::user()->id);
         })->get();*/

         //fetch all advertisments and there event info (with event) where the user_id is equal to the currently logged in user
         $advertisements2 = Advertisements::with('event')->where('user_id',  Auth::user()->id)->where('active', 1)->get();
         //dd($advertisements2);

           
         foreach ($advertisements2 as $advertisement) {
             
             $amount_of_quers = $this->get_amount_of_quers($advertisement->id);
             
             $my_advertisement = (object)['advertisement' => $advertisement, 'amount_of_quers' => $amount_of_quers];

             array_push($my_advertisements, $my_advertisement);
         }
           
         return view('my_advertisements', ['advertisements' => $my_advertisements]);
     }

    
    
    public function get_amount_of_quers($id_advert)
    {
        //this function should be called in my_advertisments, for each advertisement.
        $contracts = Contracts::where('advertisement_id', $id_advert)->where('phase_id', 1)->get();
        return count($contracts);
    }
    
    
    
    public function add_advertisement($id = null)
    {
        if ($id) {
            $event = Events::find($id);
            //dd($event);
            return view('add_advertisement', ['event' => $event]);
        } else {
            return view('add_advertisement');
        }
    }
    
    
    
    //STORE function
    public function store_new_advertisement(Request $request)
    {
        //check whether there was an event id
        //yes --> create new advertisement
        //no --> send errormessage
        if ($request->event_id) {
            //store advertisement
            $event_id = $request->event_id;
        } else {
            //no event was selected -> redirect with error message (flash message)
            return \Redirect::back()->withErrors(['Je hebt geen evenement geselecteerd!']);
        }


        //advertisement is active by default
        $active = 1;
        
        $advertisement = new Advertisements(['user_id' => $request->user_id,
            'event_id' => $event_id,
            'private_description' => $request->private_description,
            'price' => $request->price,
            'active' => $active
        ]);

        $advertisement->save();

        //$this->store_user_advert($advertisement->user_id, $advertisement->id);

        //dd($advertisement);

        return redirect('/my_advertisements');
    }
    
    
    
}
