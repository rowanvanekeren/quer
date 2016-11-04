@extends('layouts.app')
@section('title', 'Account bewerken')
@section('content')
    @include('layouts.dashboard_menu')
    <div class="variable_content">
        <!-- old values should be displayed here -->
        <h1>Account bewerken</h1>

        <div class="edit_account">


            <form role="form" method="POST" action="{{ url('/update_account') }}" enctype="multipart/form-data">
                {{ csrf_field() }}


                <div>
                    <label for="first_name">Voornaam:</label>
                    <input id="first_name" type="text" name="first_name" value="{{Auth::user()->first_name}}" required
                           autofocus>
                    @if ($errors->has('first_name'))
                        <strong>{{ $errors->first('first_name') }}</strong>
                    @endif
                </div>

                <div>
                    <label for="last_name">Achternaam:</label>
                    <input id="last_name" type="text" name="last_name" value="{{Auth::user()->last_name}}" required
                           autofocus>
                    @if ($errors->has('last_name'))
                        <strong>{{ $errors->first('last_name') }}</strong>
                    @endif
                </div>

                <div>
                    <label for="username">Username:</label>
                    <input id="username" type="text" name="username" value="{{Auth::user()->username}}" required
                           autofocus>
                    @if ($errors->has('username'))
                        <strong>{{ $errors->first('username') }}</strong>
                    @endif
                </div>

                <div>
                    <label for="country">Land:</label>
                    <input id="country" type="text" name="country" value="{{ Auth::user()->country }}" required
                           autofocus>
                    @if ($errors->has('country'))
                        <strong>{{ $errors->first('country') }}</strong>
                    @endif
                </div>

                <div>
                    <label for="city">Stad:</label>
                    <input id="city" type="text" name="city" value="{{ Auth::user()->city }}" required autofocus>
                    @if ($errors->has('city'))
                        <strong>{{ $errors->first('city') }}</strong>
                    @endif
                </div>

                <div>
                    <label for="postal_code">Postcode:</label>
                    <input id="postal_code" type="text" name="postal_code" value="{{ Auth::user()->postal_code }}"
                           required autofocus>
                    @if ($errors->has('postal_code'))
                        <strong>{{ $errors->first('postal_code') }}</strong>
                    @endif
                </div>

                <div>
                    <label for="street">Straat:</label>
                    <input id="street" type="text" name="street" value="{{ Auth::user()->street }}" required autofocus>
                    @if ($errors->has('street'))
                        <strong>{{ $errors->first('street') }}</strong>
                    @endif
                </div>

                <div>
                    <label for="house_number">Huisnummer:</label>
                    <input id="house_number" type="text" name="house_number" value="{{ Auth::user()->house_number }}"
                           required autofocus>
                    @if ($errors->has('house_number'))
                        <strong>{{ $errors->first('house_number') }}</strong>
                    @endif
                </div>

                <div>
                    <label for="phone_number">Telefoonnummer:</label>
                    <input id="phone_number" type="text" name="phone_number" value="{{ Auth::user()->phone_number }}"
                           required autofocus>
                    @if ($errors->has('phone_number'))
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    @endif
                </div>

                <div>
                    <label for="email">E-Mail adres:</label>
                    <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" required>
                    @if ($errors->has('email'))
                        <strong>{{ $errors->first('email') }}</strong>
                    @endif
                </div>


                <div>
                    <label for="image">Profielfoto:</label>
                    <input type="file" id="image" name="image">
                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>


                <button type="submit">
                    Bijwerken
                </button>

            </form>
        </div>
    </div>
@endsection