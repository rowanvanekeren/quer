
                    
@extends('layouts.app')

@section('content')   
<!-- old values should be displayed here -->
                       <form  role="form" method="POST" action="{{ url('/update_account') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                            <label for="first_name">Voornaam</label>


                                <input id="first_name" type="text" name="first_name" value="{{Auth::user()->first_name}}" required autofocus>

                                @if ($errors->has('first_name'))

                                        <strong>{{ $errors->first('first_name') }}</strong>

                                @endif

                            <label for="last_name">Last name</label>


                            <input id="last_name" type="text" name="last_name" value="{{Auth::user()->last_name}}" required autofocus>

                            @if ($errors->has('last_name'))

                                <strong>{{ $errors->first('last_name') }}</strong>

                            @endif

                            <label for="username">Username</label>


                            <input id="username" type="text" name="username" value="{{Auth::user()->username}}" required autofocus>

                            @if ($errors->has('username'))

                                <strong>{{ $errors->first('username') }}</strong>

                            @endif

                            <label for="country">Country</label>


                            <input id="country" type="text" name="country" value="{{ Auth::user()->country }}" required autofocus>

                            @if ($errors->has('country'))

                                <strong>{{ $errors->first('country') }}</strong>

                            @endif

                            <label for="city">City</label>


                            <input id="city" type="text" name="city" value="{{ Auth::user()->city }}" required autofocus>

                            @if ($errors->has('city'))

                                <strong>{{ $errors->first('city') }}</strong>

                            @endif

                            <label for="postal_code">Postal code</label>


                            <input id="postal_code" type="text" name="postal_code" value="{{ Auth::user()->postal_code }}" required autofocus>

                            @if ($errors->has('postal_code'))

                                <strong>{{ $errors->first('postal_code') }}</strong>

                            @endif

                            <label for="street">Street</label>


                            <input id="street" type="text" name="street" value="{{ Auth::user()->street }}" required autofocus>

                            @if ($errors->has('street'))

                                <strong>{{ $errors->first('street') }}</strong>

                            @endif

                            <label for="house_number">House number</label>


                            <input id="house_number" type="text" name="house_number" value="{{ Auth::user()->house_number }}" required autofocus>

                            @if ($errors->has('house_number'))

                                <strong>{{ $errors->first('house_number') }}</strong>

                            @endif

                            <label for="phone_number">Phone number</label>


                            <input id="phone_number" type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" required autofocus>

                            @if ($errors->has('phone_number'))

                                <strong>{{ $errors->first('phone_number') }}</strong>

                            @endif


                            <label for="email" >E-Mail Address</label>


                            <input id="email" type="email"  name="email" value="{{ Auth::user()->email }}" required>

                            @if ($errors->has('email'))

                                <strong>{{ $errors->first('email') }}</strong>

                            @endif


                            <label for="image">Image:</label>

                            <input type="file" id="image" name="image">

                        @if ($errors->has('image'))

                            <strong>{{ $errors->first('image') }}</strong>

                        @endif




                                <button type="submit">
                                    Update
                                </button>

                    </form>
                    
@endsection