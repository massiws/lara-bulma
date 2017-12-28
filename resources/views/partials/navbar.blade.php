<nav class="navbar has-shadow is-primary" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a href="#" class="navbar-item is-paddingless">
            <figure class="image">
                <img src="{{ url('images/logo.png') }}">
            </figure>
        </a>
        <div class="navbar-burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="navbar-menu" id="navMenu">
        <div class="navbar-start"></div>

        <div class="navbar-end">
            @if (Auth::guest())
                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                <a class="navbar-item " href="{{ route('register') }}">Register</a>
            @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link is-hidden-mobile">
                        <figure class="image is-rounded is-32x32">
                            <img src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : env('DEFAULT_AVATAR', '-') }}">
                        </figure>
                    </a>

                    <div class="navbar-dropdown is-right is-boxed">
                        <a class="navbar-item" href="{{ route('users.show', ['id' => Auth::id()]) }}" title="Profile">
                            <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <span>&nbsp;{{ Auth::user()->name }}</span>
                        </a>

                        <a class="navbar-item" href="{{ route('logout') }}" title="Log out"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="icon"><i class="fa fa-power-off" aria-hidden="true"></i></span>
                            <span>&nbsp;Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
