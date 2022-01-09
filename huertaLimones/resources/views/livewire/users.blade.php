<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-3">
                <h2 class="center-align">Users</h2>
                @if (session()->has('message'))
                    <div class="row yellow blue-text center-align">
                        <p class="flow-text">{{session('message')}}</p>
                    </div>
                @endif
                <a href="/users/create" class="btn-flat flow-text green darken-3 white-text modal-trigger">Create Users</a>
                <div class="container hoverable">
                    <table class="highlight centered responsive-table blue-grey lighten-5">
                        <thead>
                            <tr>
                                <th class="flow-text">id</th>
                                <th class="flow-text">nombre</th>
                                <th class="flow-text">e-mail</th>
                                <th class="flow-text">admin</th>
                                <th class="flow-text">editar</th>
                                <th class="flow-text">borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="flow-text">{{$user->id}}</td>
                                    <td class="flow-text">{{$user->name}}</td>
                                    <td class="flow-text">{{$user->email}}</td>
                                    <td class="flow-text">{{$user->admin}}</td>
                                    <td>
                                        <a href="/users/{{$user->id}}/edit" class="btn-floating deep-orange white-text">
                                            <i class="material-icons left">edit</i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="/users/{{$user->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn-floating red white-text">
                                                <i class="material-icons left">delete</i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal modal-fixed-footer" id="delete{{$user->id}}">
                                    <div class="modal-content red">
                                        <h4 class="white-text center">¿Está seguro de que desea eliminar? {{$user->name}}</h4>
                                        <form wire:submit.prevent="userDelete({{$user->id}})">
                                            <button wire:onclick="userDelete({{$user->id}})" class="btn white red-text modal-close" type="submit"><i class="material-icons left">delete</i><i class="material-icons left">warning</i>Yes</button>
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
            </div>
        </div>
    </x-slot>
</x-app-layout>
