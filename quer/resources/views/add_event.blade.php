
@extends('layouts.app')

@section('content')

    <div>
        <form id="add_event_form" action="{{ url('new_advertisement') }}" method="POST" enctype="multipart/form-data">
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
                <label for="event_date">Datum evenement:</label>
                <input id="event_date" name="event_date" type="date" >
                <input id="starttime" name="starttime" type="time" >
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
                <label for="categorie">Categorie:</label>
                <input id="categorie" name="categorie" type="text" >
            </div>

            <div class="add_button">
                <button type="submit">
                    Advertentie publiceren
                </button>
            </div>

        </form>
    </div>
@endsection