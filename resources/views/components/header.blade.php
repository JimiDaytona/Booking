<header>
    <p class="logo">Logo</p>
    <menu>
        <ul>
            @if(Auth::id() == 1)
                <li><a href="{{ route('admin-room') }}">AdminRoom</a></li>
            @endif
            @auth()
                <li><a href="{{ route('logout') }}">Logout</a></li>
                <li><a href="{{ route('my-room') }}">MyRoom</a></li>
            @else
                <li><a href="/auth">login</a></li>
                <li><a href="/register">Registration</a></li>
            @endif
        </ul>
    </menu>
</header>
