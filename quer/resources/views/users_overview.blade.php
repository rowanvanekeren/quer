@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="variable_content">


       <h1>Gebruikersoverzicht</h1>
       
       <div class="user_overview">
           
           <table>
               <tr>
                   <th>Achternaam</th>
                   <th>Voornaam</th>
                   <th>Gebruikersnaam</th>
                   <th>Verwijder</th>
               </tr>
               
               @foreach($users as $user)
               <tr>
                   <td>{{ $user->last_name }}</td>
                   <td>{{ $user->first_name }}</td>
                   <td>{{ $user->username }}</td>
                   <td><a href="{{ url('/delete_user/'. $user->id) }}">Verwijder</a></td>
               </tr>
               @endforeach
               
           </table>
           
       </div>
       
       <h1>Evenementenoverzicht</h1>
       
       <div class="user_overview">
           
           <table>
               <tr>
                   <th>Eventnaam</th>
                   <th>Datum verkoop</th>
                   <th>Admin event</th>
                   <th>Verwijder</th>
               </tr>
               
               @foreach($events as $event)
               <tr>
                   <td>{{ $event->name }}</td>
                   <td>{{ $event->date_start_sell }}</td>
                   <td>{{ $event->code }}</td>
                   <td><a href="{{ url('/delete_event/'. $event->id) }}">Verwijder</a></td>
               </tr>
               @endforeach
               
           </table>
           
       </div>
       
       
    </div>

@endsection