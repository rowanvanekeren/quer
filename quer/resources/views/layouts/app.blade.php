<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

    {{--<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">--}}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>




</head>
<body>
<div class="standard-nav">
    <ul>
    <li> <a href="#">About</a></li>
    <li> <a href="#">Services</a></li>
    <li> <a href="#">Clients</a></li>
    <li> <a href="#">Contact</a></li>
        <li onclick="openNav()"><a> <</a></li>
    </ul>



</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()"><</span>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">



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
