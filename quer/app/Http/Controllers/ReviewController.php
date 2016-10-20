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

        if(!isset($alreadyHasReview)){
            $active = 1;
            $review = new Reviews([
                'quer_id' => $request->quer_id,
                'applicant_id' => Auth::user()->id,
                'content' => $request->content,
                'rate' => $request->rate,
                'succeeded' => $request->succeeded,
                'advertisement_id' => $request->advertisement_id,
                'active' => $active,
            ]);

            $review->save();
        }
    }
}
