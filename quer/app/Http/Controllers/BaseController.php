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

    
    public function get_all_users() {
        //
        $users = User::where('active', 1)->orderBy('last_name', 'asc')->get();
        $events = Events::where('active', 1)->orderBy('date_start_sell', 'asc')->get();
        
        if(Auth::user()->is_admin) {
            return view('users_overview', ['users' => $users, 'events' => $events]);
        }
        else {
            abort(404);
        }
    }
    
    public function delete_user($id) {
        //
        //dd($id);
        if(Auth::user()->is_admin) {
            $user = User::find($id);
            $user->active = 0;
            $user->save();
            //also set all of his advertisements and contracts inactive
            $advertisements = Advertisements::where('user_id', $id)->get();
            foreach($advertisements as $advertisement) {
                $advertisement->active = 0;
                $advertisement->save();
            }
            $contracts = Contracts::where('quer_id', $id)->orWhere('applicant_id', $id)->get();
            foreach($contracts as $contract) {
                $contract->active = 0;
                $contract->save();
            }
        }
        
        return redirect('/users_overview');
        
    }
    
    

    public function store_user_advert($user_id, $advert_id)
    {
        $user_advert = new Usr_Adv(['user_id' => $user_id,
            'advertisement_id' => $advert_id
        ]);

        $user_advert->save();
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


        return $complete_adverts_users;
    }

    public function get_homepage()
    {
        $events = $this->get_all_events(6);
        $advertisements = Advertisements::where('active', 1)->with('user')->with('event')->get();
        $page_content = (object)['advertisement' => $advertisements, 'event' => $events];
        return view('home-new', ['advertisements' => $advertisements, 'events' => $events]);
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
        $adverts = Advertisements::where('active', 1)->with('user')->with('event')->get();
        $search_results = $this->search_string($adverts, $request->search_string);
        $final_results = [];
        
        //if dates are set, check if results are between dates
        if($request->from != "" && $request->till != ""){
            foreach($search_results as $result) {
                if (($result->event->date_start_sell > $request->from && $result->event->date_start_sell < $request->till) || ($result->event->date_event > $request->from && $result->event->date_event < $request->till))
                {
                    array_push($final_results, $result);
                }
                else {
                    //
                }
            }
        }
        else {
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
            $userRev = User::where('id', $review->applicant_id)->first();

            array_push($applicants,[$userRev, $review]);
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


}
