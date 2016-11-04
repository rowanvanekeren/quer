@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="variable_content">


        <h1>Welkom {{ Auth::user()->first_name }}</h1>
       
       <div>
           Wat kan je allemaal doen op dit dashboard?
           <div>
               <ul>
                   <li>Bij je advertenties kan je zien hoeveel Que'rs zich hebben aangemeld voor jouw advertenties.</li>
               </ul>
           </div>
       </div>
       <p>Hierop kan je je huidige contracten, openstaande advertenties, ... zien</p>
      
       <p>Onderstaand dashboard menu moet ook in een soort layout staan die ge-extend kan worden</p>


    </div>

@endsection