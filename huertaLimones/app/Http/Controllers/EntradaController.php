<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use App\Models\Prod_ents;
use App\Models\Producto;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrada = Entradas::select()->get();
        $prod_ents = Prod_ents::select()->get();
        $productos = Producto::select()->get();
        return view('livewire.entradas')
            ->with('entradas', $entrada)
            ->with('prod_ents', $prod_ents)
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::select()->get();
        return view('livewire.ent-make')
            ->with('productos', $productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ENT_DATE' => 'required',
            'PROD_ID' => 'required'
        ]);
        Entradas::create([
            'ENT_DATE' => $request->input('ENT_DATE')
        ]);

        $this->createProdEnt($request['PROD_ID']);
        return redirect('/entradas')->with('message', 'Entrada Creado!');
    }
    public function createProdEnt($prod){
        $getID = Entradas::latest()->first();
        Prod_ents::create([
            'ENT_ID' => $getID['id'],
            'PROD_ID' => $prod
        ]);
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ent = Entradas::where('id', $id)->first();
        $productos = Producto::select()->get();
        return view('livewire.ent-edit')
            ->with('entrada', $ent)
            ->with('productos', $productos);
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
        $request->validate([
            'ENT_DATE' => 'required',
            'PROD_ID' => 'required'
        ]);
        Entradas::where('id', $id)->update([
            'ENT_DATE' => $request->input('ENT_DATE')
        ]);
        return redirect('/entradas')->with('message', 'Entrada Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod_ent = Prod_ents::where('ENT_ID', $id);
        $prod_ent->delete();
        $ent = Entradas::where('id', $id);
        $ent->delete();
        return redirect('/entradas')->with('message','Entrada Borrada!');
    }
}
