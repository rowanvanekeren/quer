@extends('layouts.app')

@section('title', 'Advertentie info')

@section('content')


    <div class="variable_content">
        <h1>{{$advert->event->name}}</h1>

        <div class="advert_overview">
            <div class="left_box">
                <h3>{{$advert->event->name}}</h3>

                <div>
                    <img src="../images/events/{{$advert->event->image}}">
                </div>
                <div class="description">
                    {{$advert->event->description}}
                </div>
                <div class="date">
                    <label>Datum evenement:</label><span>{{$advert->event->date_event}}</span>
                </div>
                <div class="date">
                    <label>Startdatum verkoop:</label><span>{{$advert->event->date_start_sell}}</span>
                </div>
                <div>
                    <a href="{{$advert->event->url}}">Meer info</a>
                </div>
            </div>

            <div class="right_box">
                <h3>Bied je aan!</h3>

                <div>
                    <div class="applicant"><img src="../images/profiles/{{$advert->user->image}}"
                                                alt="profile_pic"><span>{{$advert->user->username}}:</span></div>
                    <div class="description">&#8220;{{$advert->advert->private_description}}&#8221;</div>
                    <div class="price">
                        <label>Prijs:</label><span>&euro;{{ number_format((float)$advert->advert->price, 2, '.', '') }}</span>
                    </div>
                </div>
                <div class="form">
                    <form role="form" method="POST" action="{{ url('/new_contract') }}">
                        {{ csrf_field() }}

                        <div>
                            <label for="fee">Ik wil que'n voor &euro;</label>
                            <input type="number" name="fee" id="fee" step="0.01" placeholder="jouw prijs (bvb 50)"
                                   required>
                        </div>

                        <input type="hidden" name="quer_id" id="quer_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="applicant_id" id="applicant_id" value="{{$advert->user->id}}">
                        <input type="hidden" name="advertisement_id" id="advertisement_id"
                               value="{{$advert->advert->id}}">

                        <button type="submit">Ik wil que'r zijn!</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection