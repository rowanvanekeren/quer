@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="variable_content">


        <h1>Welkom {{ Auth::user()->first_name }}</h1>
       
       <div class="dashboard">
           <h3>Wat kan je allemaal doen op dit dashboard?</h3>
           <div>
               <ul>
                   <li>Bij je <a href="{{ url('/my_advertisements') }}">advertenties</a> kan je zien hoeveel Que'rs zich hebben aangemeld voor jouw advertenties.</li>
                   <li>Of je kan er een <a href="{{ url('/add_advertisement')}}">nieuwe advertentie</a> aanmaken.</li>
                   <li>Heb je gequed voor iemand of heb je een contract aangegaan met een quer, blijf dan op de hoogte via je <a href="{{ url('/contracts_overview') }}">contracten.</a></li>
                   <li>Heb je zelf ook al gequed? Volg dan wat mensen van jouw vinden bij je <a href="{{ url('/user_details/'. Auth::user()->id) }}">reviews.</a></li>
               </ul>
           </div>
       </div>
       
    </div>

@endsection