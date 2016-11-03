
@extends('layouts.app')

@section('content')
    <div class="variable_content">

        <form id="add_event_form" action="{{ url('new_event') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <h3 class="title">Evenement toevoegen</h3>

            <div>
                <label for="name">Naam:</label>
                <input id="name" name="name" type="text" required >
            </div>

            <div>
                <label for="description">Beschrijving:</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div>
                <label for="location">Locatie:</label>
                <input id="location" name="location" type="text" >
            </div>

            <div>
                <label for="city">Stad:</label>
                <input id="city" name="city" type="text" >
            </div>

            <div>
                <label for="url">Url:</label>
                <input id="url" name="url" type="url">
            </div>

            <div>
                <label for="startdate">Startdatum verkoop:</label>
                <input id="startdate" name="startdate" type="date" >
                <input id="starttime" name="starttime" type="time" >
            </div>
            <div>
                <label for="eventdate">Datum evenement:</label>
                <input id="eventdate" name="eventdate" type="date" >
                <input id="eventtime" name="eventtime" type="time" >
            </div>


            <div>
                <label for="image">Afbeelding:</label>
                <input type="file" id="image" name="image">
            </div>

            <div>
                <label for="tags">Tags:</label>
                <input id="tags" name="tags" type="text" >
            </div>

            <div>
                <label for="category">Categorie:</label>
                <input id="category" name="category" type="text" >
            </div>

            <div class="add_button">
                <button type="submit">
                    Event toevoegen
                </button>
            </div>

        </form>
        <div class="add_event_wrapper">
            <table class="add_event_quers_left" >
                <tr><th>{{--aantal quers--}}</th></tr>
                @foreach ($events as $event)
                    <tr> <td><div class="add_event_events" style="background-image: url('../public/images/events/{{$event->image}}') " ></div>
                        </td>

                    </tr>

                @endforeach

            </table>

            <table class="add_event_right" >
                <tr>

                    <th>Evenement</th>
                    <th>Advertentie beschrijving</th>
                    <th>Datum</th>
                    <th>Aantal que'rs</th>
                </tr>
                @foreach ($events as $event)

                    <tr>

                        <td><div class="add_event_right_max_height">{{ $event->name }} </div></td>
                        <td><div class="add_event_right_max_height">{{ $event->location }}</div></td>
                        <td>{{$event->date_start_event}}</td>
                        <td>{{$event->date_sell_start}}</td>
                    </tr>

                @endforeach
            </table>
        </div>


        </div>
@endsection