@extends('layouts.app')

@section('title', "Que'rs")

@section('content')


<div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Que'rs voor de advertentie {{ $event->name }}</h1>
       <p>Hier heb je een overzicht van mensen die gequeued hebben voor deze advertentie.</p>
       
       
       
       @foreach ($quers as $quer)
       <div>

           <div>{{ $quer->quer->username }}</div>
           <div>{{ $quer->quer->email }}</div>
           <div><a href="{{url('/update_contract/'.$quer->contract_id)}}">Kies Que'r ! {{ $quer->contract_id }}</a></div>
       </div>
       @endforeach
       
       
       
   </div>



@endsection