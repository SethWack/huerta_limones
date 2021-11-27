<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-3">
                <h2 class="center-align">Compras</h2>
                @if (session()->has('message'))
                    <div class="row green">
                        <p class="flow-text">{{session('message')}}</p>
                    </div>
                @endif
                <button href="#productAdd" class="btn-flat flow-text green darken-3 white-text modal-trigger">Crear Compra</button>
                <div class="container hoverable">
                    <table class="highlight centered responsive-table blue-grey lighten-5">
                        <thead>
                            <tr>
                                <th class="flow-text">Id</th>
                                <th class="flow-text">Usuario</th>
                                <th class="flow-text">Producto</th>
                                <th class="flow-text">Tipo de Pago</th>
                                <th class="flow-text">Entrada de pago</th>
                                <th class="flow-text">Fecha de pago</th>
                                <th class="flow-text">Fecha de entrega</th>
                                <th class="flow-text">Edit</th>
                                <th class="flow-text">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
    </x-slot>
</x-app-layout>