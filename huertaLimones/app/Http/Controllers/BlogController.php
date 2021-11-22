<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Blogs as Bloggy;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('livewire.blog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.blogs-make');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['BLOG_IMG'] = $request['BLOG_IMG']->store('blogs');
        $request->validate([
            'BLOG_TITLE' => 'required',
            'BLOG_DESC' => 'required',
            'BLOG_SLUG' => 'required',
            'BLOG_TEXT' => 'required',
            'USER_ID' => 'required',
            'BLOG_IMG' => 'required|max:5048',
        ]);
        $slug = SlugService::createSlug(Blogs::class, 'BLOG_SLUG', $request['BLOG_TITLE']);
        Blogs::create([
            'BLOG_TITLE' => $request->input('BLOG_TITLE'),
            'BLOG_DESC' => $request->input('BLOG_DESC'),
            'BLOG_SLUG' => $slug,
            'BLOG_TEXT' => $request->input('BLOG_TEXT'),
            'USER_ID' => $request->input('USER_ID'),
            'BLOG_IMG' => $request->input('BLOG_IMG')

        ]);
        return redirect('/')->with('messages', 'Blog Created!');
    }
    static function show()
    {
        $blogs = Blogs::orderBy('id', 'DESC')->get();
        return $blogs;
    }
    static function getUsers(){
        $users = DB::table('users')->get();
        return $users;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    static function edit($slug)
    {
        return view('livewire.blogs-edit')
            ->with('blog', Blogs::where('BLOG_SLUG',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'BLOG_TITLE' => 'required',
            'BLOG_DESC' => 'required',
            'BLOG_SLUG' => 'required',
            'BLOG_TEXT' => 'required',
            'USER_ID' => 'required',
            'BLOG_IMG' => 'required|max:5048',
        ]);
        Blogs::where('BLOG_SLUG', $slug)->update([
            'BLOG_TITLE' => $request->input('BLOG_TITLE'),
            'BLOG_DESC' => $request->input('BLOG_DESC'),
            'BLOG_SLUG' => $slug,
            'BLOG_TEXT' => $request->input('BLOG_TEXT'),
            'USER_ID' => $request->input('USER_ID'),
            'BLOG_IMG' => $request->input('BLOG_IMG')
        ]);
        return redirect('/')
            ->with('message','Yout Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    static function destroy($slug)
    {
        $blog = Blogs::where('BLOG_SLUG', $slug);
        $blog->delete();
        return redirect('/')
            ->with('message', 'Blog Deleted!');
    }
}
