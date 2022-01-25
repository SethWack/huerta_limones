<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row white z-depth-3">
            <div class="center">
                <h1>Carrito de {{$user->name}}</h1>
            </div>
            @foreach($car_prods as $car_prod)
                <div class="row">
                    <div class="col s2"></div>
                    <div class="col s8 center container">
                        <div class="card horizontal">
                            <div class="card-image">
                                @foreach ($productos as $product)
                                    @if($product->id == $car_prod->PROD_ID)
                                        <img class="responsive-img" src="{{asset('images/'.$product->IMG_PATH)}}" alt="">
                                    @endif
                                @endforeach
                            </div>
                            <div class="card-stacked">
                                @foreach ($productos as $prod)
                                    @if($car_prod->PROD_ID == $prod->id)
                                        <div class="card-content">
                                            @foreach ($tipos as $tipo)
                                                @if($tipo->id == $prod->TIPO_ID)
                                                    <span class="card-title">{{$tipo->TIPO_NAME}}</span>
                                                @endif
                                            @endforeach
                                            <p class="flow-text">Costo: ${{$prod->PROD_PRICE}}.00</p>
                                            <p class="flow-text">Cantidad: {{$car_prod->PROD_AMMOUNT}}</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="/store/{{$car_prod->id}}/edit" class="btn-flat deep-orange white-text">Comprar</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-app-layout>
