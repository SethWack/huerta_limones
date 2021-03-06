<?php

namespace App\Http\Controllers;

use App\Models\Stores;
use App\Models\Car_prods;
use Illuminate\Http\Request;
use App\Http\Livewire\Store as Story;
use App\Models\Prod_tipos;
use App\Models\Producto;
use App\Models\Tipo_pagos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = DB::table('productos')->get();
        $types = DB::table('prod_tipos')->get();
        $row_count = 0;
        return view('livewire.store')
            ->with('productos', $productos)
            ->with('types' , $types)
            ->with('row_count', $row_count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Producto::where('id', $id)->first();
        $prod_tipo = Prod_tipos::where('id', $product['TIPO_ID'])->first();
        return view('livewire.store-buy')
            ->with('producto', $product)
            ->with('prod_tipo', $prod_tipo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car_prod = Car_prods::where('id', $id)->first();
        $productos = Producto::where('id', $car_prod['PROD_ID'])->first();
        $tipo = Prod_tipos::where('id', $productos['TIPO_ID'])->first();
        $tipo_pago = Tipo_pagos::select()->get();
        return view('livewire.store-purchase')
            ->with('producto', $productos)
            ->with('tipo', $tipo)
            ->with('tipo_pagos', $tipo_pago);
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
        //
    }
}
