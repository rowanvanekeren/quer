
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <title>Document</title>
</head>
<body>
    <div class="home_banner">
        <nav class="home_navigation">
            <div>
               {{-- left-side nav bar--}}
                <ul class="home-nav-left">
                    <li>quer</li>

                </ul>
                {{--right-side nav bar--}}
                <ul class="home-nav-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else

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
        <form class="home-search">
            <ul>
                <li><input type="text"></li>
                <li><input type="text"></li>
                <li><input type="text"></li>
                <li><button type="submit">Zoeken</button></li>
            </ul>
        </form>
        </div>
    </div>
<h1>{{$main_content->advertisement[0]->price}}</h1>
</body>
</html>