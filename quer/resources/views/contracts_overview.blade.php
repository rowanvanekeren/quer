@extends('layouts.app')

@section('title', 'Contract overzicht')

@section('content')


<div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Contractenoverzicht</h1>
       <p>Informatie contracten (die minstens status agreement hebben) (dus waar phase_nr >= 10).</p>
       
       
       <h2>Als Que'r</h2>
       <div>
           als quer
           
           @foreach($quer_contracts as $q_contract)
           <div>
               {{ $q_contract->price }}
           </div>
           @endforeach
           
       </div>
       
       
       <h2>Als Applicant</h2>
       <div>
           als applicant
           
           @foreach($applicant_contracts as $a_contract)
           <div>
               {{ $a_contract->price }}
           </div>
           @endforeach
       </div>
       
       
   </div>



@endsection