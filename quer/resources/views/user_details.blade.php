@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
    <div class="variable_content">
        <div>
            <div class="usr_det_img" style="background-image: url('../images/profiles/{{$user->image}}')"></div>
            <div class="usr_det_inf"><h2>{{$user->first_name}} {{$user->last_name}}</h2>

                <p>lid sinds: {{$user->created_at}}</p>

                <p>Gemiddelde rating: {{$rate_score}} op 5</p>
            </div>
            <h1>Reviews</h1>

            <div class="usr_det_rev_wrapper">
                @foreach($reviews as $review)
                    <div class="usr_det_review">

                        <div class="usr_rev_img"
                             style="background-image: url('../images/profiles/{{$review[0]->image}}')"></div>
                        <div class="usr_rev_content"><p>{{$review[0]->first_name}} schreef:</p>

                            <p style="font-style: italic; color:blue;">"{{$review[1]->content}}"</p>

                            <p>Rating: {{$review[1]->rate}}</p>

                            <p>Geslaagde transactie: @if($review[1]->succeeded == 1) Ja @else Nee @endif</p>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
    </div>
@endsection