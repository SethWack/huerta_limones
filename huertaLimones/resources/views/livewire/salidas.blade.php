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
                <a href="/salidas/create" class="btn-flat flow-text green darken-3 white-text modal-trigger">Crear Salida</a>
                <div class="container hoverable">
                    <table class="highlight centered responsive-table blue-grey lighten-5">
                        <thead>
                            <tr>
                                <th class="flow-text">Id</th>
                                <th class="flow-text">Salida</th>
                                <th class="flow-text">Producto ID</th>
                                <th class="flow-text">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salidas as $salida)
                                <tr>
                                    <td class="flow-text">{{$salida->id}}</td>
                                    <td class="flow-text">{{$salida->SAL_DATE}}</td>
                                    @foreach ($prod_sals as $prodsal)
                                        @foreach ($productos as $product)
                                            @if($prodsal->PROD_ID == $product->id && $prodsal->SAL_ID == $salida->id)
                                                <td class="flow-text">{{$product->id}}</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <td>
                                        <form action="/salidas/{{$salida->id}}" method="POST">
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
