<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col s12 center">
                <h1 class="green-text center-align">Editar Blog</h1>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        @livewire('blogs-edit')
    </x-slot>
</x-app-layout>