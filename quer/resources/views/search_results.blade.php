@extends('layouts.app')

@section('title', 'Advertentie info')


@section('content')


    <div class="variable_content">
        <h1>Zoekresultaten voor &#8220;{{ $search_string}}&#8221;:</h1>

        <div class="search_results">
            <div class="homepage-adverts">
                @foreach ($advertisements as $advert)
                    <div style="background:url(./images/events/{{  $advert->event->image }})">
                        <div class="homepage-adverts-gradient">


                            <h2><a href="{{ url('/advert_overview/'. $advert->id) }}">{{$advert->event->name}}</a></h2>
                            <ul>
                                <li><img src="./images/profiles/{{  $advert->user->image }}"/></li>
                                <li><p>
                                        <a href="{{ url('/user_details/'. $advert->user->id) }}">{{$advert->user->username}} </a>
                                    </p></li>
                                <li><p>&euro; {{ number_format((float)$advert->price, 2, '.', '') }}</p></li>

                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </div>


@endsection