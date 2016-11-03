@extends('layouts.app')

@section('title', 'Contract details')

@section('content')


<div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Contractdetails</h1>
       
       @if (session('msg'))
           <div class="msg_info">
               {{ session('msg') }}
           </div>
       @endif
       
       <div>
           <div class="contract_users">
               <div class="quer">
                   <h3>Que'r</h3>
                   <div class="details">
                       <div class="image" style="background:url(../images/profiles/{{ $quer->image }})">
                           
                       </div>
                       <div class="info">
                           <div>{{ $quer->username }}</div>
                           <div>{{ $quer->first_name }} {{ $quer->last_name }}</div>
                           <div><a href="mailto:{{ $quer->email }}">{{ $quer->email }}</a></div>
                           <div>{{ $quer->phone_number }}</div>
                           <div>{{ $quer->username }}</div>
                       </div>
                   </div>
                   
               </div>

               <div class="applicant">
                   <h3>Apply'r</h3>
                   <div class="details">
                       <div class="image" style="background:url(../images/profiles/{{ $applicant->image }})">
                           
                       </div>
                       <div class="info">
                           <div>{{ $applicant->username }}</div>
                           <div>{{ $applicant->first_name }} {{ $applicant->last_name }}</div>
                           <div><a href="mailto:{{ $applicant->email }}">{{ $applicant->email }}</a></div>
                           <div>{{ $applicant->phone_number }}</div>
                           <div>{{ $applicant->username }}</div>
                       </div>
                   </div>
               </div>
           </div>
           
           
           <div class="contract_info">
               <h3>Contractinfo</h3>
               <div class="details">
                   <div class="static">
                       <div>
                           <label>Evenement:</label><span>{{ $event->name }}</span>
                       </div>
                       
                       <div>
                           <label>Fase van contract:</label><span>{{ $contract->phases->phase_description }}</span>
                       </div>
                       <div>
                           <label>Prijs van advertentie (&euro;):</label><span class="price">{{ number_format((float)$contract->advertisements->price, 2, '.', '') }}</span>
                       </div>
                       <div>
                           <label>Prijs van Que'r (&euro;):</label><span class="price">{{ number_format((float)$contract->price, 2, '.', '') }}</span>
                       </div>
                       <div>
                           <label>Totale prijs (&euro;):</label><span class="price">{{ number_format((float)($contract->advertisements->price + $contract->price), 2, '.', '') }}</span>
                       </div>
                   </div>
                   
                   <div class="variable">
                       @if(Auth::user()->id == $quer->id && $contract->phases->phase_number == 10)
                       <div>
                           <div>
                               Als je het ticket gekocht hebt, upload het dan hier zodat de aanvrager het kan downloaden.  Het geld wordt overgemaakt zodra de aanvrager het ticket geaccepteerd heeft.
                           </div>
                           <form id="upload_ticket" action="{{ url('upload_ticket') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                               <div>
                                   <label for="ticket">Upload ticket:</label>
                                   <input type="file" name="ticket" id="ticket">
                               </div>
                               <div>
                                   <input type="number" name="contract_id" value="{{$contract->id}}" hidden="hidden">
                               </div>
                               
                               <input type="submit" value="Upload">
                           </form>
                       </div>
                       @endif
                       @if(Auth::user()->id == $quer->id && $contract->phases->phase_number != 10)
                       <div>
                           Bedankt voor het uploaden van het ticket!  Van zodra de apply'r het ticket geaccepteerd heeft, wordt je geld overgemaakt!
                       </div>
                       @endif
                       
                       @if(Auth::user()->id == $applicant->id && $contract->phases->phase_number == 10)
                       <div>De que'r heeft je ticket nog niet geüpload.  Nog eventjes geduld.</div>
                       @endif
                       
                       @if(Auth::user()->id == $applicant->id && $contract->phases->phase_number >= 15)
                       <div>

                           <div class="ticket">
                               <a href="{{ route('download_ticket', [$contract->id]) }}">Download Ticket</a>
                           </div>

                           @if($contract->phases->phase_number < 25)
                           <form id="accept_ticket" action="{{ url('accept_ticket') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                               <input type="checkbox" name="acceptance" id="acceptance">
                               <label for="acceptance">Het ontvangen ticket is in orde!</label>
                               <input type="submit" value="Stuur bevestiging">
                           </form>
                           @endif
                       </div>
                       @endif
                       
                       @if(Auth::user()->id == $applicant->id && $contract->phases->phase_number >= 20 && $contract->phases->phase_number != 30)
                       <div class="review">
                           <form id="add_review" action="{{ url('') }}" method="POST" >
                               <input type="hidden" name="quer_id" id="add_rev_querid" value="{{$quer->id}}">
                               <input type="hidden" name="advertisement_id" id="add_rev_advertid" value="{{$contract->advertisement_id}}">

                               <div>
                                   <label for="add_rev_content">Schrijf hier je review:</label>
                                   <textarea type="text" name="content" id="add_rev_content"></textarea>
                               </div>
                               
                               <div class="rate">
                                   <label for="add_rev_rate">Score Que'r:</label>
                                   <!--<input id="add_rev_rate" name="rate" type="range" min="1" max="5" value="1">-->
                                   <div><input type="radio" name="rate" value="1" id="1"><label for="1">1</label></div>
                                   <div><input type="radio" name="rate" value="2" id="2"><label for="2">2</label></div>
                                   <div><input type="radio" name="rate" value="3" id="3"><label for="3">3</label></div>
                                   <div><input type="radio" name="rate" value="4" id="4"><label for="4">4</label></div>
                                   <div><input type="radio" name="rate" value="5" id="5"><label for="5">5</label></div>
                               </div>
                               
                               <!--<div class="succeeded">
                                   <input id="add_rev_succeeded" name="succeeded" type="checkbox">
                                   <label for="add_rev_succeeded">Succesvolle transactie</label>
                               </div>-->
                               
                               <input type="submit" value="Verstuur review">
                           </form>
                       </div>
                       @endif
                       
                   </div>
                   
               </div>

           </div>
           
           
           
           
           
           
           
           
           
           
       </div>
       
       
       
       
       
   </div>



@endsection