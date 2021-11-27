<x-jet-action-section class="hoverable">
    <x-slot name="title">
        {{ __('Autenticación de dos pasos') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Anadir seguridad adicional a tu cuenta usando autenticación de dos pasos') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                {{ __('Tu tienes autenticación de dos pasos abilitada.') }}
            @else
                {{ __('Tu no tienese autenticación de dos paso abilitada.') }}
            @endif
        </h3>

        <div class="green white-text">
            <p>
                {{ __('Cuando tienes autenticación de dos paso, se dara una llave segura y aleatoria durante la autenticación que sera dado en tu aplicacion de Google en tu telefono.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="blue-grey white-text">
                    <p class="font-semibold">
                        {{ __('Autenticación de dos paso esta abilitada. Escanea el codigo QR a tu aplicacion de autenticación de Google en tu telefono.') }}
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="deep-orange white-text">
                    <p class="font-semibold">
                        {{ __('Guarda estos códigos de recuperación en un administrador de contraseñas. Se pueden ser usados para recuperar la cuenta si no tiene una forma de autenticar tu cuenta en ti aplicacion.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled" class="btn green white-text">
                        {{ __('Abiltar') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3" class="btn green white-text">
                            {{ __('Regenerar códigos de recuperación') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3" class="btn green white-text">
                            {{ __('Mostrar códigos de recuperación') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled" class="red white-text">
                        {{ __('Desabilitar') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>
