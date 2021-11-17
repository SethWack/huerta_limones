<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Blogs;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

class BlogsEdit extends Component
{
    use WithFileUploads;
    public $blogId;
    public $lists=[];
    public $rules=[
        'blogs->BLOG_TITLE' => 'required'
    ];

    public function render(Request $request)
    {
        $this->blogId = $request->query('ids');
        $blogs = BlogController::edit($this->blogId);
        return view('livewire.blogs-edit')
        ->with('blogs', $blogs);
    }
    public function editBlog(){
        $this->lists['BLOG_SLUG'] = $this->lists['BLOG_TITLE'];
        $validator = Validator::make($this->lists,[
            'BLOG_TITLE' => 'required',
            'BLOG_DESC' => 'required',
            'BLOG_SLUG' => 'required',
            'BLOG_TEXT' => 'required',
        ])->validate();
        Blogs::where('id', 1)->update($validator);
        return redirect('dashboard');
    }
}
