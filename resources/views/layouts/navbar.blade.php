<!-- Main -->
<div id="main">
    <div class="inner">
            <!-- Header -->
        <header id="header">
            <div class="logo">
                <div class="navb">
                    <h1 class="top-left"><a href="{{ url('/') }}">Ty<span>lko</span></a></h1>
                    <ul>
                        <div class="top-right">
                        @if (Route::has('login'))
                                @auth
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/contactUs') }}">Contact us </a></li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('profile')}}">
                                            {{ __('My profile') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @else
                                    <li><a href="{{ url('/home') }}">Home</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>

                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                    <li><a href="{{ url('/contactUs') }}">Contact us </a></li>
                                @endauth
                        @endif
                        </div>
                    </ul>
                </div>
            </div>
        </header>
        <div class="page-content"> @yield('content')</div>
    </div>
</div>

