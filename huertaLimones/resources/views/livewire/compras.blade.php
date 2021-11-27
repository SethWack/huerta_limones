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
                                <th class="flow-text">Tipo de Pago</th>
                                <th class="flow-text">Producto</th>
                                <th class="flow-text">Fecha de pago</th>
                                <th class="flow-text">Fecha de entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pagos as $pago)
                                <tr class="center">
                                    <td class="flow-text">{{$pago->id}}</td>
                                    <td class="flow-text">
                                        @foreach ($users as $user)
                                            @if($user->id == $pago->USER_ID)
                                                {{$user->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="flow-text">
                                        @foreach ($tipo_pagos as $tipo_pago)
                                            @if ($tipo_pago->id == $pago->CARD_ID)
                                                {{$tipo_pago->CARD_DESC}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="flow-text">
                                        @foreach ($productos as $product)
                                            @foreach ($pag_prods as $pag_prod)
                                                @if ($pag_prod->PAG_ID == $pago->id)
                                                    @if($pag_prod->PROD_ID == $product->id)
                                                        @foreach($prod_tipos as $prod_tipo)
                                                            @if($prod_tipo->id == $product->TIPO_ID)
                                                                {{$prod_tipo->TIPO_NAME}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td class="flow-text">
                                        {{$pago->PAG_DATE}}
                                    </td>
                                    <td class="flow-text">
                                        @foreach ($pag_ents as $pag_ent)
                                            @if ($pag_ent->PAG_ID == $pago->id)
                                                @foreach ($entregas as $entrega)
                                                    @if($entrega->id == $pag_ent->ENTG_ID)
                                                        {{$entrega->ENTG_DATE}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </x-slot>
</x-app-layout>