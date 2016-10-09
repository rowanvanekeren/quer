
@extends('layouts.app')

@section('content')
  {{$advert[0]->event->name}}
  {{$advert[0]->event->description}}
  {{$advert[0]->event->location}}
  {{$advert[0]->event->city}}
  {{$advert[0]->event->url}}
  {{$advert[0]->event->date_start_sell}}
  {{$advert[0]->event->date_event}}
  {{$advert[0]->event->image}}
  {{$advert[0]->event->tags}}
  {{$advert[0]->event->date_event}}
  {{$advert[0]->event->categorie}}
  {{$advert[0]->event->code}}

    <button type="submit">Ik wil que'r zijn!</button>
@endsection