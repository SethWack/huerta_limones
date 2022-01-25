<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;


class Users extends Component
{
    use WithPagination;

    public $userList;
    public $editList;
    protected $rules = [
        'userList.name' => 'required|string|min:4',
        'userList.email' => 'required|string',
        'userList.password' => 'required|string|min:8|',
        'userList.admin' => 'required'
    ];
    public function render()
    {
        $getUsers = DB::table('users')->get();
        return view('livewire.users')
            ->with('users', $getUsers);
    }
    public function userEdit($id){
        $this->userList = $this->editList;
        $this->validate();
        $this->userList['password'] = Hash::make($this->userList['password']);
        User::where('id',$id)->update($this->userList);
    }
    public function userDelete($id){
        $user = User::where('id', $id);
        $user->delete();
    }
    public function userAdd(){
        $this->validate();
        $this->userList['password'] = Hash::make($this->userList['password']);
        User::create($this->userList);
        session()->flash('message', 'Usuario Creado exitosamente!');
    }

}
