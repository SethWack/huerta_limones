<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BlogsDelete extends Component
{
    public function render()
    {
        Blogs::delete();
        return view('livewire.blogs')->with('messages',"post deleted");
    }
}
