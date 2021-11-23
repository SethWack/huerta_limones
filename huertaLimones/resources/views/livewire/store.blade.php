<x-app-layout>
    <x-slot name="header">
        <div class="container">
            @if (session()->has('message'))
                <div class="row light-green white-text valign-wrapper">
                    <p class="flow-text center">{{session('message')}}</p>
                </div>
            @endif
            <h2 class="deep-orange-text center-align header">
                Tienda
            </h2>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="row container">
            <div class="col s12">
                @foreach ($productos as $product)
                    <div class="row hoverable orange lighten-4">
                        <div class="col s2"></div>
                        <div class="col s8">
                            <div class="card horizontal white">
                                <div class="card-image">
                                    <img class="responsive-img" src="{{asset('images/'.$product->IMG_PATH)}}" alt="">
                                </div>
                                <div class="card-stacked">
                                    <div class="card-content">
                                        @foreach ($types as $type)
                                            @if ($type->id == $product->TIPO_ID)
                                                <span class="card-title deep-orange-text">{{$type->TIPO_NAME}}</span>
                                            @endif
                                        @endforeach
                                        <p>Precio: ${{$product->PROD_PRICE}}.00</p>
                                        <p>Cantidad: {{$product->PROD_AMMOUNT}}</p>
                                    </div>
                                    <div class="card-action">
                                        <a class="btn-flat light-green white-text" href="/store/{{$product->id}}">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s2"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
