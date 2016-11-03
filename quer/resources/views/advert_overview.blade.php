
@extends('layouts.app')

@section('title', 'Advertentie info')

@section('content')
  
  
<div class="variable_content">
    <h1>{{$advert->event->name}}</h1>
    
    <div class="advert_overview">
        <div class="left_box">
            <h3>{{$advert->event->name}}</h3>
            <div>
                {{$advert->event->description}}
            </div>
            <div>
                Startdatum verkoop: {{$advert->event->date_start_sell}}
            </div>
            <div>
                <a href="{{$advert->event->url}}">Meer info</a>
            </div>
        </div>

        <div class="right_box">
            <div>
                {{$advert->user->username}} zoekt een quer dit evenement.
                <div>Beschrijving</div>
                <div>{{$advert->advert->private_description}}</div>
                <div>Prijs: {{ number_format((float)$advert->advert->price, 2, '.', '') }}</div>
            </div>
            <div>
                <form  role="form" method="POST" action="{{ url('/new_contract') }}">
                    {{ csrf_field() }}

                    <label for="fee">Ik wil que'n voor</label>
                    <input type="number" name="fee" id="fee"  step="0.01" placeholder="jouw prijs (bvb 50)" required>

                    <input type="hidden" name="quer_id" id="quer_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="applicant_id" id="applicant_id" value="{{$advert->user->id}}">
                    <input type="hidden" name="advertisement_id" id="advertisement_id" value="{{$advert->advert->id}}">

                    <button type="submit">Ik wil que'r zijn!</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
   
    
@endsection