<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BlogController;
use App\Models\Blogs;
use Livewire\Component;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\WithFileUploads;

class BlogsMake extends Component
{
    use WithFileUploads;

    public $BLOG_TITLE;
    public $BLOG_TEXT;
    public $BLOG_IMG;
    public $USER_ID;
    public $BLOG_SLUG;
    public $BLOG_DESC;

    protected $rules = [
        'BLOG_TITLE' => 'required',
        'BLOG_TEXT' => 'required',
        'USER_ID' => 'required',
        'BLOG_IMG' => 'required|mimes:jpg,png,jpeg|max:5048'
    ];

    public function render()
    {
        return view('livewire.blogs-make');
    }

    public function submit(){
        $this->validate([
            'BLOG_TITLE' => 'required',
            'BLOG_TEXT' => 'required',
            'BLOG_DESC' => 'required',
            'BLOG_IMG' => 'image|max:5048'
        ]);

        $new_image = uniqid() . '-' . $this->BLOG_TITLE . '.' . $this->BLOG_IMG->extension();
        $this->BLOG_SLUG = $this->BLOG_TITLE;
        $this->BLOG_IMG->storeAs(public_path('images'), $new_image);
        $this->USER_ID = 1;
        Blogs::create([
            'BLOG_SLUG' => $this->BLOG_SLUG,
            'BLOG_TITLE' => $this->BLOG_TITLE,
            'BLOG_DESC' => $this->BLOG_DESC,
            'BLOG_TEXT' => $this->BLOG_TEXT,
            'BLOG_IMG' => $new_image,
            'USER_ID' => $this->USER_ID
        ]);

        return redirect('dashboard')->with('message', 'Your Post was Created!');
    }
}
