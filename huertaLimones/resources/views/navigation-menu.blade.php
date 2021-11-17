<nav x-data="{ open: false }" class="white z-depth-3">
    <!-- Primary Navigation Menu -->
    <div class="nav-wrapper z-depth-3">
        <a href="{{ route('dashboard') }}" class="light-green-text brand-logo hide-on-small-and-down">
            <i class="material-icons left">grass</i>
            Huerta Limones
        </a>
        <a href="" data-target="side-button" class="sidenav-trigger deep-orange-text"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="btn btn-flat waves-effect waves-green white light-green-text">
                        {{ __('Main') }}
                </a>
            </li>
            <li>
                <x-jet-nav-link href="{{route('store')}}" :active="request()->routeIs('store')" class="btn btn-flat white light-green-text waves-effect waves-green">
                    {{ __('store')}}
                </x-jet-nav-link>
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
                <li>
                    <a href="" data-target="user-dropdown" class="dropdown-trigger btn btn-flat light-green white-text waves-effect waves-light">
                    {{ Auth::user()->name }}
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
        <a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="btn btn-flat waves-effect waves-green white light-green-text">
                {{ __('Main') }}
        </a>
    </li>
    <li>
        <a href="" class="btn btn-flat white light-green-text waves-effect waves-green center-align">
            {{ __('Store')}}
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
                            <a href="{{ route('register') }}" class="btn btn-flat whte green-text">Register</a>
                        </li>
                    @endif
                @endauth
            </div>
        @endif
    @else
    <li>
        <a href="" data-target="side-user-dropdown" class="dropdown-trigger btn btn-flat light-green white-text waves-effect waves-light center-align">
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