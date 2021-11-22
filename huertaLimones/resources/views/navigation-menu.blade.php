<nav x-data="{ open: false }" class="white z-depth-3">
    <!-- Primary Navigation Menu -->
    <div class="nav-wrapper z-depth-3">
        <a href="/" class="light-green-text brand-logo hide-on-small-and-down">
            <i class="material-icons left">grass</i>
            Huerta Limones
        </a>
        <a href="" data-target="side-button" class="sidenav-trigger deep-orange-text"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="/" class="btn btn-flat waves-effect waves-green white light-green-text">
                    Home
                </a>
            </li>
            <li>
                <a href="/store" class="btn btn-flat white light-green-text waves-effect waves-green">
                    Store
                </a>
            </li>
            @guest
                @if (Route::has('login'))
                        @auth
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="btn btn-flat white green-text">Log in</a>
                        </li>
                            @if (Route::has('register'))
                                <li>
                                <a href="{{ route('register') }}" class="btn btn-flat white green-text">Register</a>
                                </li>
                            @endif
                        @endauth
                    </div>
                @endif
            @else
                @if (Auth::user()->admin == 1)
                    <li>
                        <a href="/admin" class="btn-flat white blue-text">Admin</a>
                    </li>
                @endif
                <li>
                    <a data-target="user-dropdown" class="dropdown-trigger btn btn-flat light-green white-text waves-effect waves-light">
                        <i class="material-icons left">edit</i>{{ Auth::user()->name }}
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
@guest

@else
    <ul id="user-dropdown" class="dropdown-content">
        <li>
            <a href="{{route('profile.show')}}">
                {{ __('Profile')}}
            </a>
        </li>
        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <li>
                <a href="{{ route('api-tokens.index') }}">
                {{ __('API Tokens') }}
                <a>
            </li>
        @endif
        <li class="deep-orange white-text btn-float">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" >
                    {{ __('Log Out') }}
                </a>
            </form>
        </li>
    </ul>
@endguest
<ul class="sidenav" id="side-button">
    <li>
        <a href="/" :active="request()->routeIs('dashboard')" class="btn btn-flat waves-effect waves-green white light-green-text">
                Home
        </a>
    </li>
    <li>
        <a href="/store" class="btn btn-flat white light-green-text waves-effect waves-green center-align">
            Store
        </a>
    </li>
    @guest
        @if (Route::has('login'))
                @auth
                @else
                <li>
                    <a href="{{ route('login') }}" class="btn btn-flat white green-text center-align">Log in</a>
                </li>
                    @if (Route::has('register'))
                        <li>
                        <a href="{{ route('register') }}" class="btn btn-flat white green-text center-align">Register</a>
                        </li>
                    @endif
                @endauth
            </div>
        @endif
    @else
        @if (Auth::user()->admin == 1)
            <li>
                <a href="/admin" class="btn-flat white blue-text center-align">Admin</a>
            </li>
        @endif
        <li>
            <a href="" data-target="side-user-dropdown" class="dropdown-trigger btn btn-flat light-green white-text waves-effect waves-light">
            {{ Auth::user()->name }}
            </a>

        </li>
    @endguest

</ul>
@guest
@else
<ul id="side-user-dropdown" class="dropdown-content">
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <li><div class="user-view">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" alt="user">
        </div></li>
    @endif
    <li>
        <a href="{{route('profile.show')}}" class="btn-flat green-text center-align center">
            {{ __('Profile')}}
        </a>
    </li>
    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
        <li>
            <a href="{{ route('api-tokens.index') }}" class="btn-flat green-text center-align">
            {{ __('API Tokens') }}
            <a>
        </li>
    @endif
    <li class="deep-orange white-text btn-float">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="btn-flat deep-orange white-text" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" >
                {{ __('Log Out') }}
            </a>
        </form>
    </li>
</ul>
@endguest