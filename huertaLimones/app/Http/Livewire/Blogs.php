<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BlogController;
use Livewire\Component;

class Blogs extends Component
{
    public function render()
    {
        $getBlogs = BlogController::show();
        $getUsers = BlogController::getUsers();
        return view('livewire.blogs')
            ->with('blogs', $getBlogs)
            ->with('users', $getUsers);
    }

}
