<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-3">
                <h2 class="center-align">Entradas</h2>
                @if (session()->has('message'))
                    <div class="row green">
                        <p class="flow-text">{{session('message')}}</p>
                    </div>
                @endif
                <a href="/entradas/create" class="btn-flat flow-text green darken-3 white-text modal-trigger">Crear Entrada</a>
                <div class="container hoverable">
                    <table class="highlight centered responsive-table blue-grey lighten-5">
                        <thead>
                            <tr>
                                <th class="flow-text">Id</th>
                                <th class="flow-text">Entrada</th>
                                <th class="flow-text">Producto ID</th>
                                <th class="flow-text">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entradas as $entrada)
                                <tr>
                                    <td class="flow-text">{{$entrada->id}}</td>
                                    <td class="flow-text">{{$entrada->ENT_DATE}}</td>
                                    @foreach ($prod_ents as $prodent)
                                        @foreach ($productos as $product)
                                            @if($prodent->PROD_ID == $product->id && $prodent->ENT_ID == $entrada->id)
                                                <td class="flow-text">{{$product->id}}</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <td>
                                        <form action="/entradas/{{$entrada->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn-floating red white-text"><i class="material-icons">delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </x-slot>
</x-app-layout>
