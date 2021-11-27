<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-3">
                <div class="row">
                    @if (session()->has('chk1'))
                        @if (session('chk1') == true)
                            <table class="striped centered red darken-3 white-text">
                                <thead>
                                    <tr>
                                        <th class="flow-text">id</th>
                                        <th class="flow-text">name</th>
                                        <th class="flow-text">email</th>
                                        <th class="flow-text">admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="flow-text">{{$user->id}}</td>
                                            <td class="flow-text">{{$user->name}}</td>
                                            <td class="flow-text">{{$user->email}}</td>
                                            <td class="flow-text">{{$user->admin}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
                <div class="row">
                    @if (session()->has('chk2'))
                        @if(session('chk2') == true)
                            <table class="striped centered blue darken-3 white-text">
                                <thead>
                                    <tr>
                                        <th class="flow-text">Id</th>
                                        <th class="flow-text">Precio</th>
                                        <th class="flow-text">Cantidad</th>
                                        <th class="flow-text">Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $product)
                                        <tr>
                                            <td class="flow-text">{{$product->id}}</td>
                                            <td class="flow-text">{{$product->PROD_PRICE}}</td>
                                            <td class="flow-text">{{$product->PROD_AMMOUNT}}</td>
                                            @foreach ($prod_tipos as $tipo)
                                                @if($tipo->id == $product->TIPO_ID)
                                                    <td class="flow-text">{{$tipo->TIPO_NAME}}</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
                <div class="row">
                    @if (session()->has('chk3'))
                        @if(session('chk3') == true)
                            <table class="striped centered orange darken-3 white-text">
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
                        @endif
                    @endif
                </div>
                <div class="row">
                    @if (session()->has('chk4'))
                        @if(session('chk4') == true)
                            <table class="striped centered green darken-3 white-text">
                                <thead>
                                    <tr>
                                        <th class="flow-text">Id</th>
                                        <th class="flow-text">Entrada</th>
                                        <th class="flow-text">Producto ID</th>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
                <div class="row">
                    @if (session()->has('chk5'))
                        @if(session('chk5') == true)
                            <table class="striped centered yellow darken-3 white-text">
                                <thead>
                                    <tr>
                                        <th class="flow-text">Id</th>
                                        <th class="flow-text">Salida</th>
                                        <th class="flow-text">Producto ID</th>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
                <div class="row">
                    @if (session()->has('chk6'))
                        @if(session('chk6') == true)
                            <table class="striped centered purple darken-3 white-text">
                                <thead>
                                    <tr>
                                        <th class="flow-text">id</th>
                                        <th class="flow-text">titulo</th>
                                        <th class="flow-text">slug</th>
                                        <th class="flow-text">descripcion</th>
                                        <th class="flow-text">texto</th>
                                        <th class="flow-text">usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td class="flow-text">{{$blog->id}}</td>
                                            <td class="flow-text">{{$blog->BLOG_TITLE}}</td>
                                            <td class="flow-text">{{$blog->BLOG_SLUG}}</td>
                                            <td class="flow-text">{{$blog->BLOG_DESC}}</td>
                                            <td class="flow-text">{{$blog->BLOG_TEXT}}</td>
                                            <td>
                                                @foreach ($users as $user)
                                                    @if($user->id == $blog->USER_ID)
                                                        {{$user->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
                <div class="row">
                    <form action="/reportes/{{$id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id" value="{{$id}}">
                        <button class="btn light-green white-text">make PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
