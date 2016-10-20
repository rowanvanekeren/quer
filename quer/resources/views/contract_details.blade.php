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
           
       </div>
       
       
       
       
       
   </div>



@endsection