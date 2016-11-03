@extends('layouts.app')

@section('title', 'Mijn advertenties')

@section('content')
  

   
   <div class="variable_content">
     
       @include('layouts.dashboard_menu')
      <div class="my_adv_page_title">
       <h1>Mijn advertenties</h1>
       <p>Hier heb je een overzicht van je bestaande advertenties.</p>

      </div>
       {{--
       @foreach ($advertisements as $advertisement)
       <div>

           <div>{{ $advertisement->event[0]->name }}</div>
           <div>{{ $advertisement->advertisement->private_description }}</div>
           <div><a href="{{url('/quer_overview/'.$advertisement->advertisement->id)}}">{{ $advertisement->amount_of_quers }}</a></div>
       </div>
       @endforeach

       --}}
       <div class="my_advert_wrapper">
           <table class="my_advert_quers_left" >
               <tr><th>{{--aantal quers--}}</th></tr>
               @foreach ($advertisements as $advertisement)
                   <tr> <td><a href="{{url('/quer_overview/'.$advertisement->advertisement->id)}}">{{ $advertisement->amount_of_quers }}</a>
                           <p> Que'rs</p>

                       </td>

                   </tr>

               @endforeach

           </table>

           <table class="my_advert_right" >
               <tr>

                   <th>Evenement</th>
                   <th>Advertentie beschrijving</th>
                   <th>Datum</th>
                   <th>Aantal que'rs</th>
               </tr>
               @foreach ($advertisements as $advertisement)

                   <tr>

                       <td><div class="my_advert_right_max_height">{{ $advertisement->advertisement->event->name }} </div></td>
                       <td><div class="my_advert_right_max_height">{{ $advertisement->advertisement->private_description }}</div></td>
                       <td>{{ $advertisement->advertisement->event->date_event }}</td>
                       <td><a href="{{url('/quer_overview/'.$advertisement->advertisement->id)}}">{{ $advertisement->amount_of_quers }}</a></td>
                   </tr>

               @endforeach
           </table>
       </div>


       
       
       
       <div>
           <a href="{{ url('/add_advertisement') }}">Nieuwe advertentie</a>
       </div>
    
   </div>
   
@endsection