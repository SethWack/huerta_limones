<?php

namespace App\Http\Controllers;

use App\Models\Prod_sals;
use App\Models\Producto;
use App\Models\Salidas;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = Salidas::select()->get();
        $prod_sals = Prod_sals::select()->get();
        $products = Producto::select()->get();
        return view('livewire.salidas')
            ->with('salidas', $salidas)
            ->with('prod_sals', $prod_sals)
            ->with('productos', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::select()->get();
        return view('livewire.salida-make')
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
            'SAL_DATE' => 'required',
            'PROD_ID' => 'required'
        ]);
        Salidas::create([
            'SAL_DATE' => $request->input('SAL_DATE')
        ]);

        $this->createProdSal($request['PROD_ID']);
        return redirect('/salidas')->with('message', 'Salida Creado!');
    }
    public function createProdSal($prod){
        $getID = Salidas::latest()->first();
        Prod_sals::create([
            'SAL_ID' => $getID['id'],
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod_sal = Prod_sals::where('SAL_ID', $id);
        $prod_sal->delete();
        $sal = Salidas::where('id', $id);
        $sal->delete();
        return redirect('/salidas')->with('message', 'Salida Borrada!');
    }
}
