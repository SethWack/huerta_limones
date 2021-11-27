<x-app-layout>
    <x-slot name="header">
        <h2 class="white green-text center center-align">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div>
        <div class="container white">
            <div class="row">
                <div class="col s12 m6">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')

                        <x-jet-section-border />
                    @endif
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div>
                            @livewire('profile.update-password-form')
                        </div>

                        <x-jet-section-border />
                    @endif
                </div>
                <div class="col m6 hide-on-small-and-down">
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>

                        <x-jet-section-border />
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col s12 hide-on-med-and-up">
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
                        <x-jet-section-border />
                    @endif
                </div>
            </div>
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
