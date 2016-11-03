@extends('layouts.app')

@section('title', 'Mijn advertenties')

@section('content')
  

   
   <div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Mijn advertenties</h1>
       <p>Hier heb je een overzicht van je bestaande advertenties.</p>
       

       {{--
       @foreach ($advertisements as $advertisement)
       <div>

           <div>{{ $advertisement->event[0]->name }}</div>
           <div>{{ $advertisement->advertisement->private_description }}</div>
           <div><a href="{{url('/quer_overview/'.$advertisement->advertisement->id)}}">{{ $advertisement->amount_of_quers }}</a></div>
       </div>
       @endforeach
       --}}
       @foreach ($advertisements as $advertisement)
       <div class="my_advert_wrapper">
           <div class="my_advert_left">
               <div class="amount_quers"><h1>{{ $advertisement->amount_of_quers }} Que'rs</h1></div>
               <h1>Beschrijving</h1>
               <p>{{ $advertisement->advertisement->private_description }}</p>
           </div>
           <div class="my_event_right" style="background-image: url('../public/images/homepage_banner/party_3.jpg')">
               <h1>{{ $advertisement->advertisement->event->name }}</h1>
           </div>
           <div class="my_advert_footer"> <h1>{{ $advertisement->amount_of_quers }} Que'rs</h1></div>

       </div>
       @endforeach
       <table class="my_advertisements">
           <tr>
               <th>Datum</th>
               <th>Evenement</th>
               <th>Aantal que'rs</th>
           </tr>
           @foreach ($advertisements as $advertisement)
           <tr>

               <td>{{ $advertisement->advertisement->event->date_event }}</td>
               <td>{{ $advertisement->advertisement->event->name }}</td>
               <td><a href="{{url('/quer_overview/'.$advertisement->advertisement->id)}}">{{ $advertisement->amount_of_quers }}</a></td>
           </tr>
           @endforeach
       </table>
       
       
       
       <div>
           <a href="{{ url('/add_advertisement') }}">Nieuwe advertentie</a>
       </div>
    
   </div>
   
@endsection