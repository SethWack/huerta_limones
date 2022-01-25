<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-3">
                <div class="row">
                    <div class="col s12 container center">
                        <h3 class="center">Exportar Reporte</h3>
                    </div>
                </div>
                <div class="row container col white light-green-text s10 offset-s1 hoverable">
                    <form action="/reportes" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p>
                            <label>
                                <input type="checkbox" value="1" name="usuarios"/>
                                <span>usuarios</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" value="2" name="productos"/>
                                <span>productos</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" value="3" name="pagos"/>
                                <span>Pagos</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" value="4" name="entradas"/>
                                <span>Entradas</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" value="5" name="salidas"/>
                                <span>Salidas</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" value="6" name="blogs"/>
                                <span>Blogs</span>
                            </label>
                        </p>
                        <button class="btn blue-grey white-text center" type="submit">Crear Reporte</button>
                    </form>
                </div>
            </div>
    </x-slot>
</x-app-layout>