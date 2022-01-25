<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use App\Models\Prod_ents;
use App\Models\Prod_tipos;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Producto::select()->get();
        $prod_tipos = Prod_tipos::select()->get();
        return view('livewire.products')
            ->with('products', $products)
            ->with('prod_tipos', $prod_tipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod_tipos = Prod_tipos::select()->get();
        return view('livewire.prod-make')
            ->with('prod_tipos', $prod_tipos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['IMG_PATH'] = $request['IMG_PATH']->store('products');
        $request->validate([
            'PROD_AMMOUNT' => 'required',
            'PROD_PRICE' => 'required',
            'TIPO_ID' => 'required',
            'IMG_PATH' => 'required',
        ]);
        Producto::create([
            'PROD_AMMOUNT' => $request->input('PROD_AMMOUNT'),
            'PROD_PRICE' => $request->input('PROD_PRICE'),
            'TIPO_ID' => $request->input('TIPO_ID'),
            'IMG_PATH' => $request->input('IMG_PATH')

        ]);
        $date = Carbon::now();
        Entradas::create(['ENT_DATE' => $date]);
        $prod = Producto::latest()->first();
        $ent = Entradas::latest()->first();
        Prod_ents::create([
            'PROD_ID' => $prod['id'],
            'ENT_ID' => $ent['id']
        ]);
        return redirect('/productos')->with('message', 'Producto Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Producto::where('id', $id)->first();
        $prod_tipos = Prod_tipos::select()->get();
        return view('livewire.prod-edit')
            ->with('prod', $prod)
            ->with('prod_tipos', $prod_tipos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['IMG_PATH'] = $request['IMG_PATH']->store('products');
        $request->validate([
            'PROD_AMMOUNT' => 'required',
            'PROD_PRICE' => 'required',
            'TIPO_ID' => 'required',
            'IMG_PATH' => 'required',
        ]);
        Producto::where('id', $id)->update([
            'PROD_AMMOUNT' => $request->input('PROD_AMMOUNT'),
            'PROD_PRICE' => $request->input('PROD_PRICE'),
            'TIPO_ID' => $request->input('TIPO_ID'),
            'IMG_PATH' => $request->input('IMG_PATH')

        ]);
        return redirect('/productos')->with('message', 'Producto Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Producto::where('id', $id)->first();
        $prodent = Prod_ents::where('PROD_ID', $id)->first();
        $prodid = $prodent['ENT_ID'];
        Prod_ents::where('PROD_ID', $id)->delete();
        Entradas::where('id', $prodid)->delete();
        $prod->delete();
        return redirect('/productos')->with('message', 'Producto Deleted!');
    }
}
