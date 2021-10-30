<x-app-layout>
    <x-slot name="header">
        <div class="container white">
            <h2 class="deep-orange-text center-align">
                {{ __('store') }}
            </h2>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="row gray lighten-4">
            <livewire:store />
        </div>
    </x-slot>
</x-app-layout>