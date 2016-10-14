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
       /*  $advertisements = Advertisements::where('user_id', Auth::user()->id)->get();*/
         $advertisements = Events::with('advertisements')->has('advertisements')->whereHas('advertisements', function ($query) {
             $query->where('user_id', '=', Auth::user()->id);
         })->get();

         $advertisements2 = Advertisements::with('event')->where('user_id',  Auth::user()->id)->get();
         dd($advertisements2);

         $advertisements = Events::with('advertisements.user')->has('advertisements')->get();
         foreach ($advertisements as $advertisement) {

             $event_info = Events::where('id', $advertisement->event_id)->get();
             //$event_info = $event_info[0];
             $amount_of_quers = $this->get_amount_of_quers($advertisement->id);

             $my_advertisement = (object)['advertisement' => $advertisement, 'event' => $event_info, 'amount_of_quers' => $amount_of_quers];

             array_push($my_advertisements, $my_advertisement);
         }


         //dd($my_advertisements);
         return view('my_advertisements', ['advertisements' => $my_advertisements]);
     }

    public function get_amount_of_quers($id_advert)
    {
        //this function should be called in my_advertisments, for each advertisement.
        $contracts = Contracts::where('advertisement_id', $id_advert)->where('phase_id', 1)->get();
        //dd(count($contracts));
        return count($contracts);

    }
}
