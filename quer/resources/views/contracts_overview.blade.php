@extends('layouts.app')

@section('title', 'Contract overzicht')

@section('content')


<div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Contractenoverzicht</h1>
       <p>Informatie contracten (die minstens status agreement hebben) (dus waar phase_nr >= 10).</p>
       
       @if (session('msg'))
           <div class="msg_info">
               {{ session('msg') }}
           </div>
       @endif
       
       <h2>Als Que'r</h2>
       <div>
           als quer
           
           @foreach($quer_contracts as $q_contract)
           <div>
               {{ $q_contract->price }}
               <a href="{{url('/contract_details/'.$q_contract->id)}}">Bekijk contract {{ $q_contract->id }}</a>
           </div>
           @endforeach
           
       </div>
       
       
       <h2>Als Applicant</h2>
       <div>
           als applicant
           
           @foreach($applicant_contracts as $a_contract)
           <div>
               {{ $a_contract->price }}
               <a href="{{url('/contract_details/'.$a_contract->id)}}">Bekijk contract {{ $a_contract->id }}</a>
           </div>
           @endforeach
       </div>
       
       
   </div>



@endsection