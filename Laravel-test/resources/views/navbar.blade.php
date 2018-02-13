<header class="masthead mb-auto">
    <div class="inner">
        <h3 class="masthead-brand">BLOG</h3>
        <nav class="nav nav-masthead justify-content-center">
            @auth
                <a class="nav-link" href={{Route('create')}}>Create</a>

                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

            @else
                <a class="nav-link" href="{{ route('login') }}">Login</a>
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    </div>
</header>