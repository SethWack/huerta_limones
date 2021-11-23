<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
            <br>
            <div class="row orange lighten-4">
                <div class="col m6 hide-on-small-and-down">
                    <img class="responsive-img" src="{{asset('images/landscape.jpg')}}" alt="">
                </div>
                <div class="col s12 m6">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h4 class="center">Login</h4>
                        <div class="input-field">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="input-field">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="btn-flat white green-text" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-jet-button class="btn blue white-text right">
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
