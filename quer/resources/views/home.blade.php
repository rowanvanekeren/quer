
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>

    <title>Document</title>
</head>
<body>
    <div class="home_banner">

        <nav class="home_navigation">
            <div>
               {{-- left-side nav bar--}}
                <ul class="home-nav-left">
                    <li>Quer</li>

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
            <div class="searchdiv"><input class="searchbox" type="text" placeholder="Zoek advertenties en verdien geld!"></div>
            <div class="datediv"><input class="datepicker" type="text" placeholder="Van"></div>
            <div class="datediv"><input class="datepicker" type="text" placeholder="Tot"></div>
            <div class="submitsearchdiv"><button class="searchbutton" type="submit">Zoeken</button></div>

        </div>
    </div>
    <section class="content">
        <h1>DIT ZIJN ALLE EVENEMENTEN</h1>
        @foreach ($main_content->event as $event)
                <div>

                    {{$event->name}}
                </div>
        @endforeach
        <h1> DIT ZIJN ALLE ADVERTENTIES MET USER INFROMATIE</h1>
        @foreach ($main_content->advertisement as $advert)
           <div>
               <h1>___________________</h1>
               <p>{{$advert->user[0]->username}}</p>
               <p>{{$advert->advert[0]->private_description}}</p>
               <h1>___________________</h1>
           </div>
        @endforeach
<h1> test </h1></br>
        <h1> test </h1></br><h1> test </h1></br><h1> test </h1></br><h1> test </h1></br>

        <h1> test </h1></br>
        <h1> test </h1></br>
        <h1> test </h1></br>
        <h1> test </h1></br><h1> test </h1></br>
        <h1> test </h1></br>





    </section>
</body>
</html>