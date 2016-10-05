@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
   
   <div class="variable_content">
     
     
      
       <h1>Dashboard</h1>
       <p>Hierop kan je je huidige contracten, openstaande advertenties, ... zien</p>
      
       <p>Onderstaand dashboard menu moet ook in een soort layout staan die ge-extend kan worden</p>
       
       @include('layouts.dashboard_menu')
       
       
       
   </div>
   
@endsection