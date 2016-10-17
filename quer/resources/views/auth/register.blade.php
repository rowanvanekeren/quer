@extends('layouts.app')

@section('content')

                    <form  role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                            <div>
                                <label for="first_name">First name</label>
                                <input id="first_name" type="text" name="first_name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('first_name'))
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                @endif
                            </div>
                            

                            <div>
                                <label for="last_name">Last name</label>
                                <input id="last_name" type="text" name="last_name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('last_name'))
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                @endif
                            </div>
                            

                            <div>
                                <label for="username">Username</label>
                                <input id="username" type="text" name="username" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <strong>{{ $errors->first('username') }}</strong>
                                @endif
                            </div>
                            

                            <div>
                                <label for="country">Country</label>
                                <input id="country" type="text" name="country" value="{{ old('country') }}" required autofocus>
                                @if ($errors->has('country'))
                                    <strong>{{ $errors->first('country') }}</strong>
                                @endif
                            </div>
                            

                            <div>
                                <label for="city">City</label>
                                <input id="city" type="text" name="city" value="{{ old('country') }}" required autofocus>
                                @if ($errors->has('city'))
                                    <strong>{{ $errors->first('city') }}</strong>
                                @endif
                            </div>
                            

                            <div>
                                <label for="postal_code">Postal code</label>
                                <input id="postal_code" type="text" name="postal_code" value="{{ old('postal_code') }}" required autofocus>
                                @if ($errors->has('postal_code'))
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                @endif
                            </div>
                            

                            <div>
                                <label for="street">Street</label>
                                <input id="street" type="text" name="street" value="{{ old('street') }}" required autofocus>
                                @if ($errors->has('street'))
                                    <strong>{{ $errors->first('street') }}</strong>
                                @endif
                            </div>
                            

                            <div>
                                <label for="house_number">House number</label>
                                <input id="house_number" type="text" name="house_number" value="{{ old('house_number') }}" required autofocus>
                                @if ($errors->has('house_number'))
                                    <strong>{{ $errors->first('house_number') }}</strong>
                                @endif
                            </div>
                            

                            <div>
                                <label for="phone_number">Phone number</label>
                                <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" required autofocus>
                                @if ($errors->has('phone_number'))
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                @endif
                            </div>
                            


                            <div>
                                <label for="email" >E-Mail Address</label>
                                <input id="email" type="email"  name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <strong>{{ $errors->first('email') }}</strong>
                                @endif
                            </div>
                            


                            <div>
                                <label for="image">Image:</label>
                                <input type="file" id="image" name="image">
                                @if ($errors->has('image'))
                                    <strong>{{ $errors->first('image') }}</strong>
                                @endif
                            </div>
                            



                            <div>
                                <label for="password">Password</label>
                                <input id="password" type="password"  name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            


                             <div>
                                 <label for="password-confirm" >Confirm Password</label>
                                 <input id="password-confirm" type="password"  name="password_confirmation" required>
                                 @if ($errors->has('password_confirmation'))
                                         <strong>{{ $errors->first('password_confirmation') }}</strong>
                                 @endif
                             </div>

                            



                                <button type="submit">
                                    Register
                                </button>

                    </form>
@endsection
