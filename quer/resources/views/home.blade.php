<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>

    <title>Que'r</title>
</head>
<body>
<div class="home_banner">

    <nav class="home_navigation">
        <div>
            {{-- left-side nav bar--}}
            <ul class="home-nav-left">
                <li><img src="{{ asset('images/querlogo/logo5.png') }}" width="50px"/></li>
                <li>Que'r</li>

            </ul>
            {{--right-side nav bar--}}
            <ul class="home-nav-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li>
                        <a href="{{ url('/Dashboard') }}">Dashboard</a>
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
            <div class="searchdiv"><input class="searchbox" name="search_string" type="text"
                                          placeholder="Zoek advertenties en verdien geld!" required></div>
            <div class="datediv"><input class="datepicker" type="text" name="from" placeholder="Van" required></div>
            <div class="datediv"><input class="datepicker" type="text" name="till" placeholder="Tot" required></div>
            <div class="submitsearchdiv">
                <button class="searchbutton" type="submit">Zoeken</button>
            </div>
        </form>
    </div>
</div>
<section class="content-wrapper">
    <div class='content-center'>
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

                        <h2><a href="{{ url('/advert_overview/'. $advert->advert->id) }}">{{$advert->event->name}}</a>
                        </h2>
                        <ul>
                            <li><img src="./images/profiles/{{  $advert->user->image }}"/></li>
                            <li><p>{{$advert->user->username}}</p></li>
                            <li><p>&euro; {{$advert->advert->price}}</p></li>

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


</body>
</html>