@extends('layouts.app')
@section('title', 'Evenement toevoegen')
@section('content')
    <div class="variable_content">
        <h1 class="title">Evenement toevoegen</h1>

        <div class="add_event_button_wrapper">
            <button id="new_event_btn" class="add_event_active" onclick="getEventWrapper(0)">Maak nieuw evenement
            </button>
            <button id="existing_event_btn" onclick="getEventWrapper(1)">Kies bestaand evenement</button>
        </div>

        <div class="new_event_collapse_anim">
            <form id="add_event_form" action="{{ url('new_event') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div>
                    <label for="name">Naam:</label>
                    <input id="name" name="name" type="text" required>
                </div>

                <div>
                    <label for="description">Beschrijving:</label>
                    <textarea id="description" name="description" required></textarea>
                </div>

                <div>
                    <label for="location">Locatie:</label>
                    <input id="location" name="location" type="text">
                </div>

                <div>
                    <label for="city">Stad:</label>
                    <input id="city" name="city" type="text">
                </div>

                <div>
                    <label for="url">Url:</label>
                    <input id="url" name="url" type="url">
                </div>

                <div>
                    <label for="startdate">Startdatum verkoop:</label>
                    <input class="datepicker" type="text" name="startdate" placeholder="Startdatum verkoop" required>
                    {{-- <input id="startdate" name="startdate" type="date" >--}}
                    <input id="starttime" name="starttime" type="time">
                </div>
                <div>
                    <label for="eventdate">Datum evenement:</label>
                    <input class="datepicker" type="text" name="eventdate" placeholder="Datum evenement" required>
                    {{-- <input id="eventdate" name="eventdate" type="date" >--}}
                    <input id="eventtime" name="eventtime" type="time">
                </div>


                <div>
                    <label for="image">Afbeelding:</label>
                    <input type="file" id="image" name="image" required>
                </div>

                <div>
                    <label for="tags">Tags:</label>
                    <input id="tags" name="tags" type="text">
                </div>

                <div>
                    <label for="category">Categorie:</label>
                    <select name="category">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == 1)selected="selected"@endif>{{ $category->categorie }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="add_button">
                    <button type="submit">
                        Event toevoegen
                    </button>
                </div>

            </form>
        </div>

        <div class="existing_event_collapse">
            <div class="add_event_wrapper">
                <table class="add_event_quers_left">
                    <tr>
                        <th>{{--aantal quers--}}</th>
                    </tr>
                    @foreach ($events as $event)
                        <tr>
                            <td>
                                <div class="add_event_events"
                                     style="background-image: url('../public/images/events/{{$event->image}}') "></div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <table class="add_event_right">
                    <tr>
                        <th>Evenement</th>
                        <th>Locatie</th>
                        <th>Datum evenement</th>
                        <th>Start verkoop</th>
                    </tr>
                    @foreach ($events as $event)
                        <tr onclick="choose_event({{ $event->id  }})">

                            <td>
                                <div class="add_event_right_max_height">{{ $event->name }} </div>
                            </td>
                            <td>
                                <div class="add_event_right_max_height">{{ $event->location }}</div>
                            </td>
                            <td>{{$event->date_event}}</td>
                            <td>{{$event->date_start_sell}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection