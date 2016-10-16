<?php

$id             = "";
$name           = "";
$description    = "";
$location       = "";
$city           = "";
$url            = "";
$date_start_sell= "";
$time_start_sell= "";
$date_event     = "";

//check whether the event param is set , if yes -> load info
if(isset($event)) {
    $id             = $event->id;
    $name           = $event->name;
    $description    = $event->description;
    $location       = $event->location;
    $city           = $event->city;
    $url            = $event->url;
    
    $date_start_sell1 = new DateTime($event->date_start_sell);
    $date_start_sell = $date_start_sell1->format('Y-m-d');
    $time_start_sell = $date_start_sell1->format('H:i');
    
    $date_event1     = new DateTime($event->date_event);
    $date_event     = $date_event1->format('Y-m-d');
    
}

?>


@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
   
   <div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Advertentie toevoegen</h1>
       <p>Hier kan je een nieuwe advertentie aanmaken.</p>
       <p>Als je vertrekt van een bestaand evenement wordt deze info meteen ingeladen, anders vul je dit helemaal zelf in en wordt er ook een nieuw evenement aangemaakt als je een advertentie aanmaakt.</p>
       
       @if($errors->any())
       <div class="msg_error">{{$errors->first()}}</div>
       @endif
       
       
       <div>
           <h3>Selecteer je evenement</h3>
           
           @if(isset($event))
           <div class="msg_info">Evenement "{{$event->name}}" geselecteerd</div>
           @else
           <div>Er is nog geen evenement geselecteerd... <a href="{{ url('add_event') }}">Voeg er één toe</a></div>
           @endif
           
  {{--         <form id="add_event_form" action="{{ url('new_advertisement') }}" method="POST" enctype="multipart/form-data">
               {{ csrf_field() }}

               <h3 class="title">Algemene evenement info (kan ingeladen worden van bestaand event)</h3>

               <div>
                   <label for="name">Naam:</label>
                   <input id="name" name="name" type="text" required value="{{ $name }}">
               </div>

               <div>
                   <label for="description">Beschrijving:</label>
                   <textarea id="description" name="description" required>{{ $description }}</textarea>
               </div>
               
               <div>
                   <label for="location">Locatie:</label>
                   <input id="location" name="location" type="text" value="{{ $location }}">
               </div>
               
               <div>
                   <label for="city">Stad:</label>
                   <input id="city" name="city" type="text" value="{{ $city }}">
               </div>
               
               <div>
                   <label for="url">Url:</label>
                   <input id="url" name="url" type="url" value="{{ $url }}">
               </div>

               <div>
                   <label for="startdate">Startdatum verkoop:</label>
                   <input id="startdate" name="startdate" type="date" value="{{ $date_start_sell }}">
                   <input id="starttime" name="starttime" type="time" value="{{ $time_start_sell }}">
               </div>
               
               <div>
                   <label for="event_date">Datum evenement:</label>
                   <input id="eventdate" name="eventdate" type="date" value="{{ $date_event }}">
                   <input id="eventtime" name="eventtime" type="time" value="">
               </div>


               <div>
                   <label for="image">Afbeelding:</label>
                   <input type="file" id="image" name="image">
               </div>
               
                </form>--}}

           <form id="add_advertisement_form" action="{{ url('new_advertisement') }}" method="POST" >
               {{ csrf_field() }}
               <h3 class="title fase1">Extra persoonlijke info</h3>


               <div>
                   <label for="event_id">Event ID:</label>
                   <input id="event_id" name="event_id" type="number" value="{{ $id }}">
                   <span>Dit zal uiteindelijk niet zichtbaar zijn (testfase alleen).  Als dit als leeg wordt doorgegeven weet je dat er een volledig nieuwe advertebtie is aangemaakt</span>
               </div>
               
               <div>
                   <label for="user_id">User ID:</label>
                   <input id="user_id" name="user_id" type="number" value="{{Auth::user()->id}}">
                   <span>Wordt automatisch ingeladen en is niet zichtbaar op het uiteindelijke form</span>
               </div>

               <div>
                   <label for="private_description">Persoonlijke beschrijving:</label>
                   <textarea id="private_description" name="private_description" required></textarea>
               </div>
               
               <div>
                   <label for="price">Prijs:</label>
                   <input id="price" name="price" type="number">
               </div>

               <div class="add_button">
                    <button type="submit">
                        Advertentie publiceren
                    </button>
               </div>

           </form>
       </div>
       
       
       
       
       
       
   </div>
   
@endsection