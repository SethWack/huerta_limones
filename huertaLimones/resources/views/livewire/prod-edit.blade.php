<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-3">
               <h2 class="center center-align">Editar Producto</h2>
                <form action="/productos/{{$prod->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-field">
                        <select name="TIPO_ID">
                            <option disabled selected value="{{$prod->TIPO_ID}}">Tipo</option>
                            @foreach ($prod_tipos as $tipo)
                                <option value="{{$tipo->id}}" name="TIPO_ID">{{$tipo->TIPO_NAME}}</option>
                            @endforeach
                            <label>Tipos</label>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">attach_money</i>
                        <input type="text" name="PROD_AMMOUNT" id="PROD_AMMOUNT" value="{{$prod->PROD_AMMOUNT}}">
                        <label for="PROD_AMMOUNT">Cantidad</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">music_note</i>
                        <input type="text" name="PROD_PRICE" id="PROD_PRICE" value="{{$prod->PROD_PRICE}}">
                        <label for="PROD_PRICE">Precio</label>
                    </div>
                    <div class="file-field input-field">
                        <div class="btn orange">
                            <span>image</span>
                            <input type="file" name="IMG_PATH" id="IMG_PATH" value="{{$prod->IMG_PATH}}">
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" name="IMG_PATH" id="IMG_PATH" class="file-path validate" value="{{$prod->IMG_PATH}}">
                        </div>
                    </div>
                    <button class="btn orange white-text" type="submit">
                        <i class="material-icons left">grass</i>
                        Editar
                    </button>
                </form>
                <a href="/productos" class="btn blue-grey white-text">
                    <i class="material-icons left">keyboard_return</i>
                    back
                </a>
            </div>
    </x-slot>
</x-app-layout>