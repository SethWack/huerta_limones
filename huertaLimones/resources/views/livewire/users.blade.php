<div class="col s12 m11 l10 grey lighten-3">
    <h2 class="center-align">Users</h2>
    @if (session()->has('message'))
        <div class="row green">
            <p class="flow-text">{{session('message')}}</p>
        </div>
    @endif
    <button href="#userAdd" class="btn-flat flow-text green darken-3 white-text modal-trigger">Create Users</button>
    <div class="container hoverable">
        <table class="highlight centered responsive-table blue-grey lighten-5">
            <thead>
                <tr>
                    <th class="flow-text">id</th>
                    <th class="flow-text">name</th>
                    <th class="flow-text">email</th>
                    <th class="flow-text">admin</th>
                    <th class="flow-text">edit</th>
                    <th class="flow-text">delete</th>
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
                            <button href="#edit{{$user->id}}" class="btn-floating deep-orange white-text modal-trigger">
                                <i class="material-icons left">edit</i>
                            </button>
                        </td>
                        <td>
                            <a href="#delete{{$user->id}}" class="btn-floating red white-text modal-trigger">
                                <i class="material-icons left">delete</i>
                            </a>
                        </td>
                    </tr>
                    <div class="modal modal-fixed-footer" id="edit{{$user->id}}">
                        <div class="modal-content">
                            <h4 class="center">Editar {{$user->name}}</h4>
                            <form wire:submit.prevent="userEdit({{$user->id}})">
                                <div class="input-field">
                                    <i class="material-icons prefix">edit</i>
                                    <x-jet-input id="USER_NAME" type="text" wire:model.defer="editList.name" value="{{$user->name}}"></x-jet-input>
                                    <label for="USER_NAME">Nombre de Usuario</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">email</i>
                                    <x-jet-input id="USER_EMAIL" type="text" wire:model.defer="editList.email" value="{{$user->email}}"></x-jet-input>
                                    <label for="USER_EMAIL">E-mail de Usuario</label>
                                </div>
                                <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <x-jet-input id="USER_PASSWORD" type="password" wire:model.defer="editList.password" value="{{$user->password}}"></x-jet-input>
                                    <label for="USER_PASSWORD">Password de Usuario</label>
                                </div>
                                <div class="input-field">
                                    <span><i class="material-icons left">warning</i>Admin</span>
                                    <p>
                                        <label>
                                        <input type="checkbox" wire:model.defer="editList.admin" value="false"/>
                                        <span>true</span>
                                        </label>
                                    </p>
                                </div>
                                <button class="btn blue darken-3 white-text modal-close" type="submit"><i class="material-icons left">tune</i>Editar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn grey darken-3 white-text modal-close"><i class="material-icons left">close</i>Cancelar</button>
                        </div>
                    </div>
                    <div class="modal modal-fixed-footer" id="delete{{$user->id}}">
                        <div class="modal-content red">
                            <h4 class="white-text center">Are you sure you want to delete? {{$user->name}}</h4>
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
    <div class="modal modal-fixed-footer" id="userAdd">
        <div class="modal-content">
            <h4 class="center">Crear Usuario</h4>
            <form wire:submit.prevent="userAdd">
                <div class="input-field">
                    <i class="material-icons prefix">edit</i>
                    <x-jet-input id="USER_NAME" type="text" wire:model.defer="userList.name"></x-jet-input>
                    <label for="USER_NAME">Nombre de Usuario</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <x-jet-input id="USER_EMAIL" type="text" wire:model.defer="userList.email"></x-jet-input>
                    <label for="USER_EMAIL">E-mail de Usuario</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <x-jet-input id="USER_PASSWORD" type="password" wire:model.defer="userList.password"></x-jet-input>
                    <label for="USER_PASSWORD">Password de Usuario</label>
                </div>
                <div class="input-field">
                    <span><i class="material-icons left">warning</i>Admin</span>
                    <p>
                        <label>
                          <input type="checkbox" wire:model.defer="userList.admin" value="false"/>
                          <span>true</span>
                        </label>
                    </p>
                </div>
                <button class="btn blue darken-3 white-text modal-close" type="submit"><i class="material-icons left">person_add</i>Crear</button>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn grey darken-3 white-text modal-close"><i class="material-icons left">close</i>Cancelar</button>
        </div>
    </div>


</div>
