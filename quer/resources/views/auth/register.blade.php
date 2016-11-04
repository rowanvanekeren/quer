

                    <form class="register_form_elem" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                            <div class="register_elements">
                {{--                <label for="first_name">First name</label>--}}
                                <input id="first_name" type="text" name="first_name" value="{{ old('name') }}" placeholder="Voornaam" required autofocus>
                                @if ($errors->has('first_name'))
                                    <script type="text/javascript">
                                        keep_register_at_error();
                                    </script>
                                    <div class="showReg"> <strong>{{ $errors->first('first_name') }}</strong></div>


                                @endif

                            </div>
                            

                            <div class="register_elements" >
                             {{--   <label for="last_name">Last name</label>--}}
                                <input id="last_name" type="text" name="last_name" value="{{ old('name') }}" placeholder="Achternaam" required autofocus>
                                @if ($errors->has('last_name'))
                                    <script type="text/javascript">
                                        keep_register_at_error();
                                    </script>
                                    <div class="showReg"> <strong>{{ $errors->first('last_name') }}</strong></div>
                                @endif
                            </div>
                            

                            <div class="register_elements">
                      {{--          <label for="username">Username</label>--}}
                                <input id="username" type="text" name="username" value="{{ old('name') }}" placeholder="Gebruikersnaam" required autofocus>
                                @if ($errors->has('username'))
                                    <script type="text/javascript">

                                        keep_register_at_error();
                                    </script>
                                    <div class="showReg">  <strong>{{ $errors->first('username') }}</strong></div>
                                @endif
                            </div>
                            

                            <div class="register_elements">
                         {{--       <label for="country">Country</label>--}}
                                <input id="country" type="text" name="country" value="{{ old('country') }}" placeholder="Land" required autofocus>
                                @if ($errors->has('country'))
                                    <script type="text/javascript">
                                        keep_register_at_error();
                                    </script>
                                    <div class="showReg"> <strong>{{ $errors->first('country') }}</strong></div>
                                @endif
                            </div>
                            

                            <div class="register_elements">
           {{--                     <label for="city">City</label>--}}
                                <input id="city" type="text" name="city" value="{{ old('country') }}" placeholder="Plaats" required autofocus>
                                @if ($errors->has('city'))
                                    <script type="text/javascript">
                                        keep_register_at_error();
                                    </script>
                                    <div class="showReg">  <strong>{{ $errors->first('city') }}</strong></div>
                                @endif
                            </div>
                            


                            

                            <div class="register_elements">
                             {{--   <label for="street">Street</label>--}}
                                <input id="street" type="text" name="street" value="{{ old('street') }}" placeholder="Straat" required autofocus>
                                @if ($errors->has('street'))
                                    <script type="text/javascript">
                                        keep_register_at_error();
                                    </script>
                                    <div class="showReg">   <strong>{{ $errors->first('street') }}</strong></div>
                                @endif
                            </div>
                            

                            <div class="register_elements">
                              {{--  <label for="house_number">House number</label>--}}
                                <input id="house_number" type="number" name="house_number" value="{{ old('house_number') }}" placeholder="Huisnummer" required autofocus>
                                @if ($errors->has('house_number'))
                                    <script type="text/javascript">
                                        keep_register_at_error();
                                    </script>
                                    <div class="showReg">   <strong>{{ $errors->first('house_number') }}</strong></div>
                                @endif
                            </div>

                        <div class="register_elements">
                            {{--         <label for="postal_code">Postal code</label>--}}
                            <input id="postal_code" type="text" name="postal_code" value="{{ old('postal_code') }}" placeholder="Post code" required autofocus>
                            @if ($errors->has('postal_code'))
                                <script type="text/javascript">
                                    keep_register_at_error();
                                </script>
                                <div class="showReg">   <strong>{{ $errors->first('postal_code') }}</strong></div>
                            @endif
                        </div>

                            <div class="register_elements">
                       {{--         <label for="phone_number">Phone number</label>--}}
                                <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="Telefoonnummer" required autofocus>
                                @if ($errors->has('phone_number'))
                                    <script type="text/javascript">
                                        keep_register_at_error();
                                    </script>
                                    <div class="showReg">  <strong>{{ $errors->first('phone_number') }}</strong></div>
                                @endif
                            </div>
                            


                            <div class="register_elements">
                        {{--        <label for="email" >E-Mail Address</label>--}}
                                <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="E-mail" required>
                                @if ($errors->has('email'))
                                    <script type="text/javascript">
                                        console.log("ik word uitgevoerd");
                                        keep_register_at_error();
                                    </script>
                                    <div class="showReg">   <strong>{{ $errors->first('email') }}</strong></div>
                                @endif
                            </div>
                            


                            <div class="register_elements">
                               {{-- <label for="password">Password</label>--}}
                                <input id="password" type="password"  name="password" placeholder="Wachtwoord" required>
                                @if ($errors->has('password'))
                                    <script type="text/javascript">
                                        keep_register_at_error();
                                    </script>
                                    <span class="help-block">
                                    <div class="showReg">     <strong>{{ $errors->first('password') }}</strong></div>
                                    </span>
                                @endif
                            </div>
                            


                             <div class="register_elements">
                               {{--  <label for="password-confirm" >Confirm Password</label>--}}
                                 <input id="password-confirm" type="password"  name="password_confirmation" placeholder="Wachtwoord bevestingen" required>
                                 @if ($errors->has('password_confirmation'))
                                     <script type="text/javascript">
                                         keep_register_at_error();
                                     </script>
                                     <div class="showReg">      <strong>{{ $errors->first('password_confirmation') }}</strong></div>
                                 @endif
                             </div>


                        <div class="register_elements">
                                   <div style="margin-bottom: 5px;">  <label for="image" ><strong >Foto toevoegen</strong></label></div>
                            <input type="file" id="image" name="image" >
                            @if ($errors->has('image'))
                                <script type="text/javascript">
                                    keep_register_at_error();
                                </script>
                                <div class="showReg">  <strong>{{ $errors->first('image') }}</strong></div>
                            @endif
                        </div>

                        <div class="register_elements">
                                <button type="submit" >
                                    Registreren
                                </button>
                        </div>
                    </form>

