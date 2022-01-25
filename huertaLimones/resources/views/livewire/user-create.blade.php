<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-4">
                <h2 class="center">Crear Usuario</h2>
                <form action="/users" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="input-field">
                        <i class="material-icons prefix">edit</i>
                        <input id="USER_NAME" type="text" name="name"/>
                        <label for="USER_NAME">Nombre de Usuario</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input id="USER_EMAIL" type="text" name="email"/>
                        <label for="USER_EMAIL">E-mail de Usuario</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="USER_PASSWORD" type="password" name="password"/>
                        <label for="USER_PASSWORD">Contraseña de Usuario</label>
                    </div>
                    <input type="hidden" name="admin" value="0">
                    <div class="input-field">
                        <button type="submit" class="btn green white-text">
                            <i class="material-icons left">account_box</i>
                            crear
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>