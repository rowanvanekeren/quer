
@extends('layouts.app')

@section('title', 'Advertentie info')

@section('content')
 
 
 <div>
     <h1>{{$advert->event->name}}</h1>
     <p>{{$advert->event->description}}</p>
 </div>
 
  <?php //dd($advert); ?>
  {{$advert->event->location}}
  {{$advert->event->city}}
  {{$advert->event->url}}
  {{$advert->event->date_start_sell}}
  {{$advert->event->date_event}}
  {{$advert->event->image}}
  {{$advert->event->tags}}
  {{$advert->event->date_event}}
  {{$advert->event->categorie}}
  {{$advert->event->code}}

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
  
   
   
    
@endsection