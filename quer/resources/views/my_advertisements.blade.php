@extends('layouts.app')

@section('title', 'Mijn advertenties')

@section('content')
  

   
   <div class="variable_content">
     
       @include('layouts.dashboard_menu')
      
       <h1>Mijn advertenties</h1>
       <p>Hier heb je een overzicht van je bestaande advertenties. + ge zou hier eigenlijk ook de gerelateerde event moeten kunnen ophalen</p>
       <p>Voorlopig nog leeg</p>
       
       
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
       <div>

           <div>{{ $advertisement->advertisement->event->name }}</div>
           <div>{{ $advertisement->advertisement->private_description }}</div>
           <div><a href="{{url('/quer_overview/'.$advertisement->advertisement->id)}}">{{ $advertisement->amount_of_quers }}</a></div>
       </div>
       @endforeach
       
       
       <div>
           <a href="{{ url('/add_advertisement') }}">Nieuwe advertentie</a>
       </div>
    
   </div>
   
@endsection