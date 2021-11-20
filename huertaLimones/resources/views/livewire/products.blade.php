<div class="col s12 m11 l10 grey lighten-3">
    <h2 class="center-align">Productos</h2>
    @if (session()->has('message'))
        <div class="row green">
            <p class="flow-text">{{session('message')}}</p>
        </div>
    @endif
    <button href="#productAdd" class="btn-flat flow-text green darken-3 white-text modal-trigger">Crear Producto</button>
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
                @foreach ($productos as $product)
                    <tr>
                        <td class="flow-text">{{$product->id}}</td>
                        <td class="flow-text">{{$product->PROD_PRICE}}</td>
                        <td class="flow-text">{{$product->PROD_AMMOUNT}}</td>
                        @foreach ($tipos as $tipo)
                            @if($tipo->id == $product->TIPO_ID)
                                <td class="flow-text">{{$tipo->TIPO_NAME}}</td>
                            @endif
                        @endforeach
                        <td class="valign-wrapper">
                            <img src="{{asset('images/'.$product->IMG_PATH)}}" class="responsive-img" alt="">
                        </td>
                        <td>
                            <button href="#edit{{$product->id}}" class="btn-floating deep-orange white-text modal-trigger">
                                <i class="material-icons left">edit</i>
                            </button>
                        </td>
                        <td>
                            <a href="#delete{{$product->id}}" class="btn-floating red white-text modal-trigger">
                                <i class="material-icons left">delete</i>
                            </a>
                        </td>
                    </tr>
                    <div class="modal modal-fixed-footer" id="edit{{$product->id}}">
                        <div class="modal-content">
                            <h4 class="center">Editar Producto ID: {{$product->id}}</h4>
                            <form wire:submit.prevent="prodEdit({{$product->id}})">
                                <div class="input-field">
                                    <i class="material-icons prefix">shopping_bag</i>
                                    <select>
                                        <option value="" disabled selected>Pide Tipo</option>
                                        @foreach ($tipos as $tips)
                                            <option value={{$tips->id}} wire:model.defer="editList.TIPO_ID">{{$tips->TIPO_NAME}}</option>
                                        @endforeach
                                    </select>
                                    <label>Pide Tipo</label>
                                </div>
                                <div class="input-field">
                                    <x-jet-input id="IMG_PATH" type="hidden" wire:model.defer="editList.IMG_PATH" value="{{$product->IMG_PATH}}" ></x-jet-input>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">attach_money</i>
                                    <x-jet-input id="PRD_PRICE" type="text" wire:model.defer="editList.PROD_PRICE" value="{{$product->PROD_PRICE}}"></x-jet-input>
                                    <label for="PROD_PRICE">Precio de Producto</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">shopping_cart</i>
                                    <x-jet-input id="PROD_AMMOUNT" type="text" wire:model.defer="editList.PROD_AMMOUNT" value="{{$product->PROD_AMMOUNT}}"></x-jet-input>
                                    <label for="PROD_AMMOUNT">Cantidad del producto</label>
                                </div>
                                <button class="btn blue darken-3 white-text modal-close" type="submit" wire:click="getImage({{$product->IMG_PATH}})"><i class="material-icons left">grass</i>Editar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn grey darken-3 white-text modal-close"><i class="material-icons left">close</i>Cancelar</button>
                        </div>
                    </div>
                    <div class="modal modal-fixed-footer" id="delete{{$product->id}}">
                        <div class="modal-content red">
                            <h4 class="white-text center">Are you sure you want to delete?</h4>
                            <form wire:submit.prevent="prodDelete({{$product->id}})">
                                <button wire:onclick="prodDelete({{$product->id}})" class="btn white red-text modal-close" type="submit"><i class="material-icons left">delete</i><i class="material-icons left">warning</i>Yes</button>
                            </form>
                        </div>
                        <div class="modal-footer red darken-3">
                            <button class="btn white red-text modal-close"><i class="material-icons left">close</i>Cancelar</button>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal modal-fixed-footer" id="productAdd">
        <div class="modal-content">
            <h4 class="center">Crear Producto</h4>
            <form wire:submit.prevent="prodAdd">
                @foreach ($tipos as $tipo)
                    @if($tipo->id == $product->TIPO_ID)
                        <div class="input-field">
                            <i class="material-icons prefix">shopping_bag</i>
                            <select>
                                <option value="" disabled selected>Pide Tipo</option>
                                @foreach ($tipos as $tips)
                                    <option value={{$tips->id}} wire:model.defer="prodList.TIPO_ID">{{$tips->TIPO_NAME}}</option>
                                @endforeach
                            </select>
                            <label>Materialize Select</label>
                        </div>
                    @endif
                @endforeach
                <div class="input-field">
                    <i class="material-icons prefix">edit</i>
                    <x-jet-input id="USER_NAME" type="text" wire:model.defer="prodList.PROD_PRICE"></x-jet-input>
                    <label for="USER_NAME">Precio de Producto</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <x-jet-input id="USER_EMAIL" type="text" wire:model.defer="prodList.PROD_AMMOUNT"></x-jet-input>
                    <label for="USER_EMAIL">Cantidad de Producto</label>
                </div>
                <div class="row">
                    <div class="file-field input-field">
                        <div class="btn-flat orange white-text">
                            <span><i class="left material-icons">folder_open</i>File</span>
                            <x-jet-input type="file" wire:model.defer="IMG_PATH" name="IMG_PATH"></x-jet-input>
                        </div>
                        <div class="file-path-wrapper">
                            <x-jet-input class="file-path validate" text="text" wire:model.defer="IMG_PATH" name="IMG_PATH"></x-jet-input>
                        </div>
                    </div>
                </div>
                <button class="btn blue darken-3 white-text modal-close" type="submit"><i class="material-icons left">image</i>Crear</button>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn grey darken-3 white-text modal-close"><i class="material-icons left">close</i>Cancelar</button>
        </div>
    </div>

</div>