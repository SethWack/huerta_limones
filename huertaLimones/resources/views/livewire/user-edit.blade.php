<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-4">
                <h2 class="center">Editar Usuario</h2>
                <form action="/users/{{$user->id}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                    <div class="input-field">
                        <i class="material-icons prefix">edit</i>
                        <input id="USER_NAME" type="text" name="name" value="{{$user->name}}"/>
                        <label for="USER_NAME">Nombre de Usuario</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input id="USER_EMAIL" type="text" name="email" value="{{$user->email}}"/>
                        <label for="USER_EMAIL">E-mail de Usuario</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="USER_PASSWORD" type="password" name="password" value="{{$user->password}}"/>
                        <label for="USER_PASSWORD">Contraseña de Usuario</label>
                    </div>
                    <div class="input-field col s2">
                        <select name="admin">
                            <option value="{{$user->admin}}" disabled selected>Admin</option>
                            <option value="1" name="admin">True</option>
                            <option value="0" name="admin">False</option>
                        </select>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn green white-text">
                            <i class="material-icons left">account_box</i>
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>