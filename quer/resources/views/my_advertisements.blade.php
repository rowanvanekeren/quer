@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
   
   <div class="variable_content">
     
     
      
       <h1>Mijn advertenties</h1>
       <p>Hier heb je een overzicht van je bestaande advertenties.</p>
       <p>Voorlopig nog leeg</p>
       
       
       @include('layouts.dashboard_menu')
       
       
       <div>
           <a href="{{ url('/add_advertisement') }}">Nieuwe advertentie</a>
       </div>
    
   </div>
   
@endsection