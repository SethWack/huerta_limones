<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BlogController;
use App\Models\Blogs;
use Livewire\Component;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

class BlogsMake extends Component
{
    use WithFileUploads;

    public $state = [];
    public $BLOG_IMG;

    public function render()
    {
        return view('livewire.blogs-make');
    }

    public function submit(){

        $this->state['BLOG_SLUG'] = $this->state['BLOG_TITLE'];
        $this->state['USER_ID'] = 1;
        $validator = Validator::make($this->state,[
            'BLOG_TITLE' => 'required',
            'BLOG_DESC' => 'required',
            'BLOG_SLUG' => 'required',
            'BLOG_TEXT' => 'required',
            'USER_ID' => 'required',
        ])->validate();
        $validator['BLOG_IMG'] = $this->BLOG_IMG->store('/','blogs');

        Blogs::create($validator);
        return redirect('dashboard')->with('message', 'Your Post was Created!');
    }
}
