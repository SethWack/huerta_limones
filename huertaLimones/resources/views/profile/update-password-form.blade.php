<x-jet-form-section submit="updatePassword" class=" hoverable">
    <x-slot name="title">
        {{ __('Actualizar Contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegurate que tu contraseña sea larga y alaeatoria para se mas seguro/a.') }}
    </x-slot>

    <x-slot name="form">
        <div class="input-field">
            <i class="material-icons prefix deep-orange-text">lock</i>
            <x-jet-label for="current_password" value="{{ __('Contraseña reciente') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="input-field">
            <i class="material-icons prefix deep-orange-text">password</i>
            <x-jet-label for="password" value="{{ __('Nueva contraseña') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="input-field">
            <i class="material-icons prefix deep-orange-text">lock_clock</i>
            <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="deep-orange white-text" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button class="btn deep-orange white-text">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
