<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            @livewire('users')
        </div>
    </x-slot>
</x-app-layout>