



                    <form id="login_form_elm" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="login_elements">
                         {{--   <label for="email">E-Mail Address</label>--}}


                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <script type="text/javascript">
                                        keep_login_at_error();

                                    </script>

                                 <div class="showLog"> <strong>{{ $errors->first('email') }}</strong></div>

                            @endif
                                </div>

                        <div class="login_elements">
                         {{--   <label for="password" >Password</label>--}}


                                <input id="password" type="password"  name="password" required>

                                @if ($errors->has('password'))
                                <script type="text/javascript">
                                    keep_login_at_error();
                                </script>
                                    <div class="showLog">   <strong>{{ $errors->first('password') }}</strong></div>

                            @endif
                                </div>

                        <div class="login_elements">

                                        <input style="margin:0; padding:0" type="checkbox" name="remember"> <strong>Remember Me</strong>


                        </div>
                        <div class="login_elements">
                                <button type="submit">
                                    Login
                                </button>

                        </div>
                 {{--       <div class="login_elements">
                                <a href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                        </div>--}}
                    </form>


