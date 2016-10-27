<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Events;
use App\Advertisements;
use App\Usr_Adv;
use App\Contracts;
use App\User;
use App\Reviews;
use DateTime;
use DB;

class ReviewController extends Controller
{
    public function add_Review(Request $request)
    {
        $alreadyHasReview = Reviews::where('advertisement_id',$request->advertisement_id )->get();
        $succeeded = "";
        if($request->succeeded == "on"){
            $succeeded = 1;

        }else{
            $succeeded = 0;
        }
        if($alreadyHasReview != ""){
            $active = 1;
            $review = new Reviews([
                'quer_id' => $request->quer_id,
                'applicant_id' => Auth::user()->id,
                'content' => $request->revcontent,
                'rate' => $request->rate,
                'succeeded' => $succeeded,
                'advertisement_id' => $request->advertisement_id,
                'active' => $active,
            ]);

            $review->save();

            return "oplsaan gelukt";
        }
        else{
            return "opslaan is niet gelukt denk ik" . $alreadyHasReview;
        }
return "error";
    }


}
