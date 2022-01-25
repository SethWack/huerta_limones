<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="deep-orange-text center-align">
                Comprar {{$prod_tipo->TIPO_NAME}}
            </h2>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="row container white z-depth-3 hoverable">
            <div class="col s6">
                <img src="{{asset('images/'.$producto->IMG_PATH)}}" class="responsive-img" alt="">
            </div>
            <div class="col s6">
                <div class="container">
                    <h3 class="center green-text">Costo: ${{$producto->PROD_PRICE}}.00</h3>
                </div>
                <div class="row">
                    <h5 class="center deep-orange-text">Cuanto a Pedir</h5>
                    <form action="/carrito" method="POST" enctype="multipart/form-data">
                        @csrf
                        Cantidad
                        <div class="row">
                            <div class="col s1"><h5>0</h5></div>
                            <div class="col s10">
                                <p class="range-field green-text">
                                <input type="range" id="PROD_AMMOUNT" min="0" max="{{$producto->PROD_AMMOUNT}}" name="PROD_AMMOUNT" />
                                </p>
                            </div>
                            <div class="col s1"><h5>{{$producto->PROD_AMMOUNT}}</h5></div>
                        </div>
                        <input type="hidden" name="USER_ID" id="USER_ID" value="{{Auth::user()->id}}">
                        <input type="hidden" name="PROD_ID" id="PROD_ID" value="{{$producto->id}}">
                        <button class="btn light-green black-text" type="submit">Agregar a Carrito</button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
