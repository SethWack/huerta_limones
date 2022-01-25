<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-3">
                <h2 class="center-align">Productos</h2>
                @if (session()->has('message'))
                    <div class="row yellow white-text">
                        <p class="flow-text center-align">{{session('message')}}</p>
                    </div>
                @endif
                <a href="/productos/create" class="btn-flat flow-text green darken-3 white-text modal-trigger">Crear Producto</a>
                <div class="container hoverable">
                    <table class="highlight centered responsive-table blue-grey lighten-5">
                        <thead>
                            <tr>
                                <th class="flow-text">Id</th>
                                <th class="flow-text">Precio</th>
                                <th class="flow-text">Cantidad</th>
                                <th class="flow-text">Nombre</th>
                                <th class="flow-text">Imagen</th>
                                <th class="flow-text">Edit</th>
                                <th class="flow-text">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="flow-text">{{$product->id}}</td>
                                    <td class="flow-text">{{$product->PROD_PRICE}}</td>
                                    <td class="flow-text">{{$product->PROD_AMMOUNT}}</td>
                                    @foreach ($prod_tipos as $tipo)
                                        @if($tipo->id == $product->TIPO_ID)
                                            <td class="flow-text">{{$tipo->TIPO_NAME}}</td>
                                        @endif
                                    @endforeach
                                    <td class="valign-wrapper">
                                        <img src="{{asset('images/'.$product->IMG_PATH)}}" class="responsive-img" alt="">
                                    </td>
                                    <td>
                                        <a href="/productos/{{$product->id}}/edit" class="btn-floating deep-orange white-text">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="/productos/{{$product->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn-floating red white-text" type="submit">
                                                <i class="material-icons">delete</i>
                                            </button>
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

