<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <div class="container">

        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />
        <div class="container">
            <div class="row orange lighten-4">
                <div class="col m6 hide-on-small-and-down">
                    <img class="responsive-img" src="https://cdn.pixabay.com/photo/2013/07/25/11/56/padlock-166882_960_720.jpg" alt="">
                </div>
                <div class="col s12 m6">
                    <span class="flow-text">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</span>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="input-field">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="btn blue white-text">
                                {{ __('Email Password Reset Link') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
