@extends('layouts.app')

@section('title', 'Contract details')

@section('content')


<div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Contractdetails</h1>
       <p>Informatie over een aangegaan contract.</p>
       
       @if (session('msg'))
           <div class="msg_info">
               {{ session('msg') }}
           </div>
       @endif
       
       <div>
           <div class="contract_users">
               <div class="quer">
                   <h3>Quer</h3>
                   <div>
                       Username: {{ $quer->username }}
                   </div>
               </div>

               <div class="applicant">
                   <h3>Apply'r</h3>
                   <div>
                       Username: {{ $applicant->username }}
                   </div>
               </div>
           </div>
           
           
           <div>
               <h3>Contractinfo</h3>
               <div>
                   Prijs van Que'r: {{ $contract->price }}
                   Fase van contract: {{ $contract->phases->phase_description }}
               </div>

           </div>
           
           
           @if(Auth::user()->id == $quer->id)
           <div>
               <form id="upload_ticket" action="{{ url('upload_ticket') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   <label for="ticket">Upload ticket:</label>
                   <input type="file" name="ticket" id="ticket">
                   <input type="number" name="contract_id" value="{{$contract->id}}">
                   <input type="submit" value="Upload">
               </form>
           </div>
           @endif
           
           
           @if(Auth::user()->id == $applicant->id && $contract->phases->phase_number >= 15)
           <div>
               
               <div class="ticket">
                   <a href="{{ route('download_ticket', [$contract->id]) }}">Download Ticket</a>
               </div>
               
               <form id="accept_ticket" action="{{ url('accept_ticket') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   <input type="checkbox" name="acceptance" id="acceptance">
                   <label for="acceptance">Het ontvangen ticket is in orde!</label>
                   <input type="submit" value="Stuur bevestiging">
               </form>
           </div>
           @endif
           
           
           
           
       </div>
       
       <div>
           <form id="add_review" action="{{ url('accept_ticket') }}" method="POST" >
               <input type="hidden" name="quer_id" id="add_rev_querid" value="{{$quer->id}}">
               <input type="hidden" name="advertisement_id" id="add_rev_advertid" value="{{$contract->advertisement_id}}">

               <label for="add_rev_content">Schrijf hier je review</label>
               <input type="text" name="content" id="add_rev_content">

               <label for="add_rev_rate">Rate</label>
               <input id="add_rev_rate" name="rate" type="range" min="1" max="5" value="1">

               <label for="add_rev_succeeded">Succesfull transaction</label>
               <input id="add_rev_succeeded" name="succeeded" type="checkbox">
           </form>
       </div>
       
       
       
   </div>



@endsection