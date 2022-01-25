<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Users;

class Admin extends Component
{
    public $showingUsers = false;
    public function render()
    {
        return view('livewire.admin');
    }
    public function showUsers(){
        return view('users');
    }
}
