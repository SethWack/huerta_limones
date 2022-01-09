<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="deep-orange-text center-align">
                {{ __('Tienda') }}
            </h2>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="row container">
            <livewire:store />
        </div>
    </x-slot>
</x-app-layout>