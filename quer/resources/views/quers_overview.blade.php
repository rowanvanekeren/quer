@extends('layouts.app')

@section('title', "Que'rs")

@section('content')


<?php
    $contract_id = "{{ contract_id }}";
?>

<div class="variable_content" ng-controller="MainController">
     
       @include('layouts.dashboard_menu')
      
       <h1>Que'rs voor je advertentie: {{ $event->name }}</h1>
       
       
       
       <table class="quers_overview">
           <tr>
               <th>Que'r</th>
               <th></th>
               <th>Prijs</th>
               <th>Kies Que'r</th>
           </tr>
           @foreach ($quers as $quer)
           <tr class="body">
               <td><img src="../../public/images/profiles/{{ $quer->quer->image }}" alt="querphoto"></td>
               <td><a href="{{ url('/user_details/'. $quer->quer->id) }}">{{ $quer->quer->username }}</td>
               <td>&euro;{{ number_format((float)$quer->contract->price, 2, '.', '') }}</td>
               <!-- oorspronkelijke href: {{url('/update_contract/'.$quer->contract->id)}} -->
               <td><a class="choose" href="#" ng-click="choose_quer('{{$quer->quer->username}}', {{$event->advertisements[0]->price}}, {{$quer->contract->price}}, {{$quer->contract->id}})">Kies Que'r !</a></td>
           </tr>
           @endforeach
       </table>
       
       
       <!-- onderstaande mag alleen verschijnen als je een quer geselecteerd hebt en moet automatisch de juiste quer inladen -->
       <div class="pop-up" ng-show="show_sure_pop_up">
           <div>
               Weet je zeker dat je @{{ quer }} als Que'r wil voor een totaal van €@{{ total_price }}?
           </div>
           <a href="{{url('/update_contract/'.$contract_id)}}">Ja, ga naar betaalpagina!</a>
       </div>
       
       
   </div>



@endsection