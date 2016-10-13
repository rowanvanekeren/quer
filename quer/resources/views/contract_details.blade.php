@extends('layouts.app')

@section('title', 'Contract details')

@section('content')


<div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Contractdetails</h1>
       <p>Informatie over een aangegaan contract.</p>
       
       
       <div>
           {{ $quer->username }}
           {{ $applicant->username }}
           {{ $contract->price }}
       </div>
       
       
       
   </div>



@endsection