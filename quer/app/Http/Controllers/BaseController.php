<?php

namespace App\Http\Controllers;

use Auth;
use App\Events;
use App\Advertisements;
use App\Usr_Adv;
use App\Contracts;
use App\User;
use App\Reviews;
use Illuminate\Http\Request;
use DateTime;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //

//all functions which have been moved to the correct controller are commented out
    //GET FUNCTIONS


    //returns advertisements created by the authenticated user
/*    public function my_advertisements()
    {
        //my_advertisements = an array that contains the advertisement info + corresponding event info
        $my_advertisements = [];

        //get all advertisements from user with given id (eventueel nog ne order by erbij zetten)
        $advertisements = Advertisements::where('user_id', Auth::user()->id)->get();
        //dd($advertisements);

        foreach ($advertisements as $advertisement) {

            $event_info = Events::where('id', $advertisement->event_id)->get();
            //$event_info = $event_info[0];
            $amount_of_quers = $this->get_amount_of_quers($advertisement->id);

            $my_advertisement = (object)['advertisement' => $advertisement, 'event' => $event_info, 'amount_of_quers' => $amount_of_quers];

            array_push($my_advertisements, $my_advertisement);
        }


        //dd($my_advertisements);
        return view('my_advertisements', ['advertisements' => $my_advertisements]);
    }*/

/*
    public function add_advertisement($id = null)
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
    */

/*    public function get_amount_of_quers($id_advert)
    {
        //this function should be called in my_advertisments, for each advertisement.
        $contracts = Contracts::where('advertisement_id', $id_advert)->where('phase_id', 1)->get();
        //dd(count($contracts));
        return count($contracts);

    }*/
/*
    public function get_quers_overview($id_advert)
    {
        //
        $advert = Advertisements::find($id_advert);
        $event = Events::find($advert->event_id);
        $contracts = Contracts::where('advertisement_id', $id_advert)->where('phase_id', 1)->get();
        $quers = [];

        foreach ($contracts as $contract) {
            //contract_id should be passed as well
            $quer = User::where('id', $contract->quer_id)->get();

            $quer_and_contract = (object)['quer' => $quer[0], 'contract_id' => $contract->id];

            array_push($quers, $quer_and_contract);
        }
        //dd($quers);

        return view('quers_overview', ['event' => $event, 'quers' => $quers]);
    }
*/
/*
    public function get_contract_details($id)
    {
        //
        $contract = Contracts::find($id);
        $quer = User::find($contract->quer_id);
        $applicant = User::find($contract->applicant_id);
        $advert = Advertisements::find($contract->advertisement_id);
        return view('contract_details', ['contract' => $contract, 'quer' => $quer, 'applicant' => $applicant]);
    }
    */
/*
    public function get_contracts_overview()
    {
        //
        $quer_contracts = $this->get_quer_contracts_overview();
        $applicant_contracts = $this->get_applicant_contracts_overview();

        return view('contracts_overview', ['quer_contracts' => $quer_contracts, 'applicant_contracts' => $applicant_contracts]);
    }


    public function get_quer_contracts_overview()
    {
        //get all contracts where you are the quer and where the phase_nr >= 10 (at least agreement)

        $contracts = Contracts::where('quer_id', Auth::user()->id)->where('phase_id', '>', 2)->get();

        //dd($contracts);
        return $contracts;

    }

    public function get_applicant_contracts_overview()
    {
        //get all contracts where you are the applicant and where the phase_nr >= 10 (at least agreement)
        $contracts = Contracts::where('applicant_id', Auth::user()->id)->where('phase_id', '>', 2)->get();

        return $contracts;
    }
*/






    //STORE FUNCTIONS

/*
    //store new advertisements
    public function store_new_advertisement(Request $request)
    {
        //dd($request);
        //check whether there was an event id
        //yes --> create new advertisement
        //no --> first create new event and then create new advertisement with event_id of the newly created event

        if ($request->event_id) {
            //store advertisement
            $event_id = $request->event_id;
            echo("advertisement created from existing event");
            //echo($request->event_id . " " . $request->name);
        } else {
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

        $this->store_user_advert($advertisement->user_id, $advertisement->id);

        //dd($advertisement);

        //hier moet de redirect wel nog staan, want indien het valideren en inserten lukt, gaat hij niet automatisch redirecten
        return redirect('/my_advertisements');
    }
*/
    public function store_user_advert($user_id, $advert_id)
    {
        $user_advert = new Usr_Adv(['user_id' => $user_id,
            'advertisement_id' => $advert_id
        ]);

        $user_advert->save();
    }

    /*
    public function add_event()
    {

        return view('add_event');

    }
    */
    /*
    public function store_new_event(Request $request)
    {
        //code for if admin event or user event
        $code = 0;
        //$category = 0;

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

        ]);

        $event->save();

        $destinationPath = base_path() . "/public/images/events";
        if (isset($request->image)) {
            if ($request->file('image')->isValid()) {
                $ext = pathinfo($request->image->getClientOriginalName(), PATHINFO_EXTENSION);
                $imageName = date('d-m-Y') . '_' . $event->id . '.' . $ext;
                /*   App::abort(500, 'Error');*//*

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

    }*/


    //this function will be called every time someone offers to be a quer
    function store_new_contract(Request $request)
    {
        //dd($request);
        //default a contract always starts with phase 1 aka in_anticipation
        $phase = 1;
        $active = 1;


        $contract = new Contracts([
            'quer_id' => $request->quer_id,
            'applicant_id' => $request->applicant_id,
            'price' => $request->fee,
            'phase_id' => $phase,
            'advertisement_id' => $request->advertisement_id,
            'active' => $active,
        ]);

        $contract->save();

        return redirect('/dashboard');
    }


    //UPDATE FUNCTIONS


    public function update_contracts($id_contract)
    {
        //the contract that is passed through parameters should be updated to phase agreement
        //the other contracts with same $advertisment_id and same $applicant_id should be updated to phase cancelled

        $contract_agreed = Contracts::find($id_contract);

        //contract agreed gets phase_id = 3, which means agreement
        $contract_agreed->phase_id = 3;


        //$contract_agreed->save();

        //fetch all other contracts on the same advertisement (the agreed contract (above) should not be fetched)
        $other_contracts = Contracts::where('advertisement_id', $contract_agreed->advertisement_id)->where('applicant_id', $contract_agreed->applicant_id)->where('id', '!=', $id_contract)->get();

        foreach ($other_contracts as $cancelled_contract) {
            //all the other events get phase_id = 2, which means cancelled
            $cancelled_contract->phase_id = 2;
            //$cancelled_contract->save();
        }

        //a function like soft_delete_advert should be called here


        dd($contract_agreed, $other_contracts);

        return redirect('/contracts_overview');

    }


    public function get_all_events($limit)
    {
        $events = Events::limit($limit)->get();
        return $events;
    }

    public function get_all_advertisements($limit)
    {
        $advertisements = Advertisements::limit($limit)->get();
        return $advertisements;
    }

    // why i dont use the find function is because when i use find i still get all users as return
    public function get_all_advertisements_with_users($id = null)
    {
        $complete_adverts_users = array();
        if (isset($id)) {
            $users_adverts = Advertisements::where('id', $id)->where('active', 1)->get();
        } else {
            $users_adverts = Advertisements::where('active', 1)->get();
        }

        foreach ($users_adverts as $usr_adv) {


            $current_user = User::where('id', $usr_adv->user_id)->get();

            $current_event = Events::where('id', $usr_adv->event_id)->get();


            $adverts_with_users = (object)['user' => $current_user[0], 'advert' => $usr_adv, 'event' => $current_event[0]];

            array_push($complete_adverts_users, $adverts_with_users);
        }



       /* $array = Events::with('advertisements.user')->has('advertisements')->get();*/


        return $complete_adverts_users;
    }

    public function get_homepage()
    {

        $events = $this->get_all_events(6);
        //$advertisements = $this->get_all_advertisements_with_users();
        /*return View('home');*/

        $advertisements = Advertisements::where('active', 1)->with('user')->with('event')->get();
        
        //dd($advertisements);
        
        $page_content = (object)['advertisement' => $advertisements, 'event' => $events];
        
        //dd($advertisements, $events);

        return view('home-new', ['advertisements' => $advertisements, 'events' => $events]);

        //return view('home-new', ['main_content' => $page_content]);

    }

    public function get_advert_overview($id)
    {
        $advertisements = $this->get_all_advertisements_with_users($id);

        return view('advert_overview', ['advert' => $advertisements[0]]);
    }

    public function get_events_between_dates($from, $till)
    {

    }

    public function get_adverts_or_events_between_dates($from, $till, $ad_or_ev)
    {
        if ($ad_or_ev == "ad") {
            $all_articles = $this->get_all_advertisements_with_users();
        } else if ($ad_or_ev == "ev") {
            $all_articles = $this->get_all_events(20);
        }

        $all_results = array();
        foreach ($all_articles as $aritcle) {

            $searchFrom = new DateTime($from);
            $searchTill = new DateTime($till);

            $advertSellTime = new DateTime($aritcle->event->date_start_sell);
            //dd($searchFrom, $searchTill,$advertSellTime );
            if ($advertSellTime >= $searchFrom && $advertSellTime <= $searchTill) {

                array_push($all_results, $aritcle);
            }
        }

        return $all_results;

    }

    public function search_on_string(array $adverts, $string)
    {
        $list_of_search_words = preg_split('/[\ \n\,]+/', $string);
        $all_results = array();
        foreach ($adverts as $advert) {

            foreach ($list_of_search_words as $word) {


                if ((string)strripos($advert->user->username, $word) != null or
                    (string)strripos($advert->event->name, $word) != null or
                    (string)strripos($advert->event->tags, $word) != null or
                    (string)strripos($advert->event->location, $word) != null or
                    (string)strripos($advert->event->city, $word) != null or
                    (string)strripos($advert->advert->private_description, $word) != null

                ) {

                    array_push($all_results, $advert);
                }
            }
        }


        return $all_results;
    }

    public function homepage_search(Request $request)
    {
        $adverts = $this->get_adverts_or_events_between_dates($request->from, $request->till, "ad");
        $search_on_strings = $this->search_on_string($adverts, $request->search_string);

        return $search_on_strings;

    }

    
    
    
    public function search_string($adverts, $string)
    {
        $list_of_search_words = preg_split('/[\ \n\,]+/', $string);
        $all_results = array();
        foreach ($adverts as $advert) {

            foreach ($list_of_search_words as $word) {


                if ((string)strripos($advert->user->username, $word) != null or
                    (string)strripos($advert->event->name, $word) != null or
                    (string)strripos($advert->event->tags, $word) != null or
                    (string)strripos($advert->event->location, $word) != null or
                    (string)strripos($advert->event->city, $word) != null

                ) {

                    array_push($all_results, $advert);
                    break;
                }
            }
        }


        return $all_results;
    }
    
    public function search_quer(Request $request) {
        //
        $adverts = Advertisements::where('active', 1)->with('user')->with('event')->get();
        $search_results = $this->search_string($adverts, $request->search_string);
        //dd($search_results);
        
        $final_results = [];
        
        //if dates are set, check if results are between dates
        if($request->from != "" && $request->till != ""){
            //dd("er zijn datums");
            foreach($search_results as $result) {
                if (($result->event->date_start_sell > $request->from && $result->event->date_start_sell < $request->till) || ($result->event->date_event > $request->from && $result->event->date_event < $request->till))
                {
                  //dd("is between");
                    array_push($final_results, $result);
                }
                else {
                    //dd("not in between");
                }
            }
        }
        else {
            //dd("no dates");
            $final_results = $search_results;
        }
        
        return view('search_results', ['advertisements' => $final_results, 'search_string' => $request->search_string]);
        
    }
    
    

    //HELPER FUNCTIONS
    public function get_user_with_adv_rev($id){
        $user = User::with('advertisements')->where("id",$id)->first();
        $reviews = Reviews::where('quer_id', $id)->get();
        $applicants = array();

        $totalrate = 0;
        $countRates = 0;
        $totalScore = 0;
        foreach($reviews as $review){
            $user = User::where('id', $review->applicant_id)->first();

            array_push($applicants,[$user, $review]);
            if(isset($review->rate)){
            $totalrate =$totalrate + (float)$review->rate;
            $countRates ++;
            }
        }
        if($totalrate != 0 || $countRates != 0){
        $totalScore = $totalrate / $countRates;
        }

        return view('user_details', ['user' => $user, 'reviews' => $applicants, 'rate_score' => $totalScore] );;
    }



    public function set_advertisements_inactive()
    {
        //
    }


}
