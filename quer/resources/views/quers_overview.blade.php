@extends('layouts.app')

@section('title', "Que'rs")

@section('content')


<div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Que'rs voor de advertentie {{ $event->name }}</h1>
       <p>Hier heb je een overzicht van mensen die gequeued hebben voor deze advertentie.</p>
       
       
       
       @foreach ($quers as $quer)
       <div>

           <div>{{ $quer->username }}</div>
           <div>{{ $quer->email }}</div>
           <div><a href="#">Kies Que'r !</a></div>
       </div>
       @endforeach
       
       
       
   </div>



@endsection