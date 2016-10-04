@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
   
   <div class="variable_content">
     
     
      
       <h1>Advertentie toevoegen</h1>
       <p>Hier kan je een nieuwe advertentie aanmaken.</p>
       <p>Als je vertrekt van een bestaand evenement wordt deze info meteen ingeladen, anders vul je dit helemaal zelf in en wordt er ook een nieuw evenement aangemaakt als je een advertentie aanmaakt.</p>
       
       
       @include('layouts.dashboard_menu')
       
       <div>
           <form id="add_advertisement_form" action="{{ url('new_advertisement') }}" method="POST" enctype="multipart/form-data">
               {{ csrf_field() }}

               <h3 class="title">Algemene evenement info (kan ingeladen worden van bestaand event)</h3>

               <div>
                   <label for="name">Naam:</label>
                   <input id="name" name="name" type="text" required>
               </div>

               <div>
                   <label for="description">Beschrijving:</label>
                   <textarea id="description" name="description" required></textarea>
               </div>
               
               <div>
                   <label for="location">Locatie:</label>
                   <input id="location" name="location" type="text">
               </div>
               
               <div>
                   <label for="city">Stad:</label>
                   <input id="city" name="city" type="text">
               </div>
               
               <div>
                   <label for="url">Url:</label>
                   <input id="url" name="url" type="url">
               </div>

               <div>
                   <label for="startdate">Startdatum verkoop:</label>
                   <input id="startdate" name="startdate" type="date">
                   <input id="starttime" name="starttime" type="time">
               </div>
               
               <div>
                   <label for="event_date">Datum evenement:</label>
                   <input id="event_date" name="event_date" type="date">
               </div>


               <div>
                   <label for="image">Afbeelding:</label>
                   <input type="file" id="image" name="image" required>
               </div>

              <!--
               <div>
                   <label for="user">Aangemaakt door:</label>
                   {{--<input type="text" id="user" name="username" value="{{Auth::user()->name}}" readonly>--}}
                   {{--<input type="number" id="user_id" name="user" value="{{Auth::user()->id}}" hidden>--}}
               </div>
                -->

               <h3 class="title fase1">Extra persoonlijke info</h3>


               <div>
                   <label for="event_id">Event ID:</label>
                   <input id="event_id" name="event_id" type="number">
                   <span>Dit zal uiteindelijk niet zichtbaar zijn (testfase alleen).  Als dit als leeg wordt doorgegeven weet je dat er een volledig nieuwe advertebtie is aangemaakt</span>
               </div>
               
               <div>
                   <label for="user_id">User ID:</label>
                   <input id="user_id" name="user_id" type="number">
                   <span>Wordt automatisch ingeladen en is niet zichtbaar op het uiteindelijke form</span>
               </div>

               <div>
                   <label for="private_description">Persoonlijke beschrijving:</label>
                   <textarea id="private_description" name="private_description" required></textarea>
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