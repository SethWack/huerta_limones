<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-3">
                <h1 class="center center-align">Crear Salida</h1>
                <form action="/salidas" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="import-field">
                        <select name="PROD_ID" id="PROD_ID" class="icon">
                            <option value="1" disabled selected>Producto ID</option>
                            @foreach ($productos as $producto)
                                <option value="{{$producto->id}}" data-icon="{{asset('images/'.$producto->IMG_PATH)}}">ID: {{$producto->id}} PRECIO:{{$producto->PROD_AMMOUNT}}</option>
                            @endforeach
                        </select>
                        <label for="PROD_ID">ID de producto</label>
                    </div>
                    <div class="import-field">
                        <i class="material-icons prefix">date</i>
                        <input type="text" name="SAL_DATE" id="SAL_DATE" class="datepicker">
                        <label for="SAL_DATE">Fecha de entrada</label>
                    </div>
                    <button class="btn gree white-text" type="submit">Crear entrada</button>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    M.Datepicker.init(elems, {
        autoClose: true,
        format:'yyyy-mm-dd'
    });
  });
</script>