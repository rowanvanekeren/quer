@extends('layouts.app')

@section('title', "Que'rs")

@section('content')


<div class="variable_content" ng-controller="MainController">
     
       @include('layouts.dashboard_menu')
      
       <h1>Que'rs voor de advertentie {{ $event->name }}</h1>
       <p>Hier heb je een overzicht van mensen die gequeued hebben voor deze advertentie.</p>
       
       
       
       
       <table class="quers_overview">
           <tr>
               <th>Que'r</th>
               <th></th>
               <th>Prijs</th>
               <th>Kies Que'r</th>
           </tr>
           @foreach ($quers as $quer)
           <tr>
               <td>{{ $quer->quer->username }}</td>
               <td><img src="../../public/images/profiles/{{ $quer->quer->image }}" alt="querphoto"></td>
               <td>{{ $quer->contract->price }}</td>
               <!-- oorspronkelijke href: {{url('/update_contract/'.$quer->contract->id)}} -->
               <td><a href="#" ng-click="choose_quer('{{$quer->quer->username}}', {{$event->advertisements[0]->price}}, {{$quer->contract->price}})">Kies Que'r ! {{ $quer->contract->id }}</a></td>
           </tr>
           @endforeach
       </table>
       
       
       <!-- onderstaande mag alleen verschijnen als je een quer geselecteerd hebt en moet automatisch de juiste quer inladen -->
       <div class="pop-up" ng-show="show_sure_pop_up">
           <div>
               Weet je zeker dat je @{{ quer }} als Que'r wil voor een totaal van €@{{ total_price }}?
           </div>
           <a href="#">Ja, ga naar betaalpagina!</a>
       </div>
       
       
   </div>



@endsection