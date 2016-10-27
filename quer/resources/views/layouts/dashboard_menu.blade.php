<div class="left-sidebar">
    <ul class="navbar-user-info">
    <li> <img class="user-image-dekstop" src="./images/profiles/{{ Auth::user()->image }}"></li>
    <li><a href="{{ url('/dashboard') }}">Hallo {{ Auth::user()->username }}!</a></li>
    </ul>

    <ul class="navbar-dekstop-content">

    <li><a href="{{ url('/my_advertisements') }}">Advertenties</a></li>
    <li><a href="{{ url('/contracts_overview') }}">Contracten</a></li>
    <li><a>Reviews</a></li>
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