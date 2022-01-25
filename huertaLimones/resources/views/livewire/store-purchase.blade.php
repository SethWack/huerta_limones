<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row white z-depth-3">
            <div class="center">
                <h1>Comprar {{$tipo->TIPO_NAME}} para: {{Auth::user()->name}}</h1>
            </div>
            <div class="row">
                <div class="col m6 hide-on-small-and-down">
                    <img class="responsive-img" src="{{asset('images/'.$producto->IMG_PATH)}}" alt="">
                </div>
                <div class="col s12 m6">
                    <h3>Precio: {{$producto->PROD_PRICE}}</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-field">
                            <select name="TIPO_PAGO" id="TIPO_PAGO">
                                <option value="0" disabled selected>Tipo de Tarjeta</option>
                                @foreach ($tipo_pagos as $tipo_pago)
                                    <option value="{{$tipo_pago->id}}">{{$tipo_pago->CARD_DESC}}</option>
                                @endforeach
                            </select>
                            <label for="TIPO_PAGO">Tipo de Tarjeta</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix light-green-text">credit_card</i>
                            <input type="text" name="card" id="card">
                            <label for="card">Numero de Tarjeta</label>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <i class="material-icons prefix light-green-text">calendar_today</i>
                                    <input type="text" name="date" id="date">
                                    <label for="date">Fecha de expiracion</label>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="input-field">
                                    <i class="material-icons prefix light-green-text">people</i>
                                    <input type="text" name="name" id="name">
                                    <label for="name">Nombre en la Tarjeta</label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="prod_id" id="prod_id" value="{{$producto->id}}">
                        <div class="input-field">
                            <button class="btn deep-orange white-text" type="submit">Comprar!</b>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
