<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->

    <link href="{{ asset('css/navigation.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard_style.css') }}" rel="stylesheet">
    <!--<link href="{{ asset('css/my_ads.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add_event.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add_advert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user_details.css') }}" rel="stylesheet">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">

    {{--<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">--}}

    @yield('custom_css')
   
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>




</head>
<body ng-app="mainApp">
<div id="login_home" class="login_form hidden"><div class="login_header">
        <h2>Login</h2>
    </div>
    <div class="login_form_content"> @include('auth.login')</div>
</div>

<div id="register_home" class="register_form hidden"><div class="register_header">
        <h2>Registreren</h2>
    </div>
    <div class="register_form_content"> @include('auth.register')</div>
</div>
<nav>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="inner-nav-content">

        @if (Auth::guest())
            <li><a class="login_btn_nav" onclick="open_login()">Login</a></li>
            <li><a class="register_btn_nav" onclick="open_register()">Register</a></li>
        @else
            <div class="image-wrapper">
                <ul>
                    <li> <img class="user-image" src="{{asset('images/profiles/'. Auth::user()->image)}}"></li>
                    <li><a href="{{ url('/dashboard') }}">Hallo {{ Auth::user()->username }}!</a></li>
                </ul>
            </div>
            {{--<a href="{{ url('/dashboard') }}">Dashboard</a>--}}
            <a href="{{ url('/my_advertisements') }}">Advertenties</a>
            <a href="{{ url('/contracts_overview') }}">Contracten</a>
            <a href="{{ url('/user_details/'. Auth::user()->id) }}">Reviews</a>
            <a href="{{ url('/edit_account') }}">Account bewerken</a>
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                {{ csrf_field() }}
            </form>
        @endif
        {{--  <a href="#">About</a>
          <a href="#">Services</a>
          <a href="#">Clients</a>
          <a href="#">Contact</a>--}}
    </div>
</div>
</nav>
    <div id="main">
    <div class="standard-nav">
        <div class="sub-nav-background-gradient">
        <a href="{{url('/')}}"><ul class="sub-nav-left">
            <li><img src="{{ asset('images/querlogo/logo5.png') }}" width="50px" /></li>
            <li>Que'r</li>
        </ul></a>
            <ul class="sub-nav-right">
            @if (Auth::guest())

                    <li><a class="login_btn_nav" onclick="open_login()">Login</a></li>
                    <li><a class="register_btn_nav" onclick="open_register()">Register</a></li>

            @else
                <div class="dropdown">
                    <ul>
                        <li><a href="{{ url('/dashboard') }}">Hallo {{ Auth::user()->username }}!</a></li>
                        <li> <img class="user-image" src="{{asset('images/profiles/'. Auth::user()->image)}}"></li>

                    </ul>
                    <div class="dropdown-content">
                        <div class="arrow-up"></div>
                        <ul class="navbar-dekstop-sub">

                            <li><a href="{{ url('/my_advertisements') }}">Advertenties</a></li>
                            <li><a href="{{ url('/contracts_overview') }}">Contracten</a></li>
                            <li><a href="{{ url('/user_details/'. Auth::user()->id) }}">Reviews</a></li>
                            <li>
                                <a href="{{ url('/edit_account') }}">Account bewerken</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>


                    </div>

                </div>
            @endif
                </ul>

            <div class="burger-wrapper">
                <img onclick="openNav()" src="{{ asset('images/icons/burgermenu.png') }}" width="40px"/>
            </div>
    <div class="sub-page-title"><h1>@yield('title')</h1></div>
        </div>
    </div>

<!-- Use any element to open the sidenav -->


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->




{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
 <!-- Resource jQuery -->


{{--    <nav class="navbar navbar-default navbar-static-top">
        <div >
            <div >



            </div>

            <div >
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else

                                {{ Auth::user()->name }} <span class="caret">




                                    <li><a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a></li>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                        {{ csrf_field() }}
                                    </form>

                    @endif
                </ul>
            </div>
        </div>
    </nav>--}}

    @yield('content')
</div>
    <!-- Scripts -->

   {{-- <script src="{{asset('js/app.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>

</body>
</html>
