@extends('layouts.app')

@section('title', "Que'rs")

@section('content')


<div class="variable_content">
     
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
               <td><a href="{{url('/update_contract/'.$quer->contract->id)}}">Kies Que'r ! {{ $quer->contract->id }}</a></td>
           </tr>
           @endforeach
       </table>
       
       
   </div>



@endsection