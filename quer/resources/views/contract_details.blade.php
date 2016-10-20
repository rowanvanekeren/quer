@extends('layouts.app')

@section('title', 'Contract details')

@section('content')


<div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Contractdetails</h1>
       <p>Informatie over een aangegaan contract.</p>
       
       
       <div>
           <div>
               <h3>Quer</h3>
               <div>
                   Username: {{ $quer->username }}
               </div>
           </div>
           
           <div>
               <h3>Apply'r</h3>
               <div>
                   Username: {{ $applicant->username }}
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
                   <input type="submit" value="Upload">
               </form>
           </div>
           @endif
           
           
           @if(Auth::user()->id == $applicant->id && $contract->phases->phase_number == 15)
           <div>
               <form id="accept_ticket" action="{{ url('accept_ticket') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   <input type="checkbox" name="acceptance" id="acceptance">
                   <label for="acceptance">Het ontvangen ticket is in orde!</label>
                   <input type="submit" value="Stuur bevestiging">
               </form>
           </div>
           @endif
           
           
           
           
       </div>
       
       
       
       
       
   </div>



@endsection