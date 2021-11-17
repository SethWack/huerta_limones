<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col s12 center">
                <h1 class="green-text center-align">Crear Blog</h1>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        @livewire('blogs-make')
    </x-slot>
</x-app-layout>