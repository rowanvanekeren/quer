<nav>
    <ul>
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
        <li>
            <a href="{{ url('/edit_account') }}">Account bewerken</a>
        </li>
        <li>
            <a href="#">Que'r</a>
            <ul>
                <li>Qued</li>
                <li><a href="{{ url('/contracts_overview') }}">Contracten</a></li>
                <li>Reviews</li>
            </ul>
        </li>
        <li>
            <a href="#">Apply'r</a>
            <ul>
                <li><a href="{{ url('/my_advertisements') }}">Advertenties</a></li>
                <li><a href="{{ url('/contracts_overview') }}">Contracten</a></li>
            </ul>
        </li>
    </ul>
</nav>