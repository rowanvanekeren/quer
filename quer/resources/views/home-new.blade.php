
<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


    <script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar-sub.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>


    <title>Que'r</title>
</head>
<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="inner-nav-content">

        @if (Auth::guest())
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        @else

            <div class="image-wrapper">
                <ul>
                    <li> <img class="user-image" src="./images/profiles/{{ Auth::user()->image }}"></li>
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
    <!-- Use any element to open the sidenav -->


<div id="main">

<div class="home_banner">

    <nav class="home_navigation">
        <div>
            {{-- left-side nav bar--}}
            <ul class="home-nav-left">
                <li><img src="{{ asset('images/querlogo/logo5.png') }}" width="50px" /></li>
                <li  >Que'r</li>

            </ul>
            {{--right-side nav bar--}}
            <ul class="home-nav-right-burger">
                <li><img onclick="openNav()" class="burger"src="{{ asset('images/icons/burgermenu.png') }}" width="40px"/></li>
            </ul>
            <ul class="home-nav-right">

                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>

                @else
                    <style>

                    </style>

                    <div class="dropdown">
                        <ul>
                            <li><a href="{{ url('/dashboard') }}">Hallo {{ Auth::user()->username }}!</a></li>
                            <li> <img class="user-image" src="./images/profiles/{{ Auth::user()->image }}"></li>

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


                @endif
            </ul>
        </div>
    </nav>
    <div class="home-center-content">
        {{--   <form class="home-search">
               <ul>
                   <li><input class="searchbox" type="text" placeholder="Zoeken.."></li>
                   <li><input class="datepicker" type="text" placeholder="Van"></li>
                   <li><input class="datepicker" type="text" placeholder="Tot"></li>
                   <li><button class="searchbutton" type="submit">Zoeken</button></li>
               </ul>
           </form>--}}
        <h1 id="inspirational-quote"> Wij staan voor jou in de rij</h1>
        <form action="{{ url('/homepage_search') }}" method="POST">
            {{ csrf_field() }}
            <div class="searchdiv"><input class="searchbox" name="search_string" type="text" placeholder="Zoek advertenties en verdien geld!" required></div>
            <div class="datediv"><input class="datepicker" type="text" name="from" placeholder="Van" required></div>
            <div class="datediv"><input class="datepicker" type="text" name="till" placeholder="Tot" required></div>
            <div class="submitsearchdiv"><button class="searchbutton" type="submit">Zoeken</button></div>
        </form>
    </div>
</div>
<section class="content-wrapper">
    <div class ='content-center'>
        <h1>Evenementen</h1>
        <div class="homepage-events">
            @foreach ($main_content->event as $event)
                <div class="homepage-events-repeated" style="background:url(./images/events/{{  $event->image }})">

                    <div class="homepage-events-gradient">
                        <h2> {{$event->name}}</h2>
                        <p class="event-location">Locatie: {{$event->location}} , {{$event->city}}</p>
                        <p class="event-date">Datum: {{$event->date_event}}</p>
                    </div>

                </div>
            @endforeach
        </div>
        <h1>Advertenties</h1>
        <div class="homepage-adverts">
            @foreach ($main_content->advertisement as $advert)

                <div style="background:url(./images/events/{{  $advert->event->image }})">
                    <div class="homepage-adverts-gradient">

                        {{--    <img src="./images/events/{{  $advert->event->image }}"/>--}}
                        {{--  <img src="./images/homepage_banner/party_1.jpg" />--}}

                        <h2><a href="{{ url('/advert_overview/'. $advert->advert->id) }}">{{$advert->event->name}}</a></h2>
                        <ul>
                            <li> <img src="./images/profiles/{{  $advert->user->image }}"/></li>
                            <li>  <p><a href="{{ url('/user_details/'. $advert->user->id) }}">{{$advert->user->username}} </a></p></li>
                            <li>  <p>&euro; {{ number_format((float)$advert->advert->price, 2, '.', '') }}</p></li>

                        </ul>
                    </div>
                </div>

            @endforeach

        </div>




    </div>
    <footer>
        sadfsadf
    </footer>
</section>

</div>
</body>
</html>