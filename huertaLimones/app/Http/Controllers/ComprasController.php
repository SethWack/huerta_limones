<?php

namespace App\Http\Controllers;

use App\Models\Entregas;
use App\Models\Pag_ents;
use App\Models\Pag_prods;
use App\Models\Pagos;
use App\Models\Prod_tipos;
use App\Models\Producto;
use App\Models\Tipo_pagos;
use App\Models\User;
use Illuminate\Http\Request;

class ComprasController extends Controller
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
        $user = User::select()->get();
        $product = Producto::select()->get();
        $entregas = Entregas::select()->get();
        $pagent = Pag_ents::select()->get();
        $pagprod = Pag_prods::select()->get();
        $pagos = Pagos::select()->get();
        $tipopago = Tipo_pagos::select()->get();
        $prodtipo = Prod_tipos::select()->get();
        return view('livewire.compras')
            ->with('users', $user)
            ->with('productos', $product)
            ->with('entregas', $entregas)
            ->with('pag_ent', $pagent)
            ->with('pag_prod', $pagprod)
            ->with('pagos', $pagos)
            ->with('tipo_pagos', $tipopago)
            ->with('prod_tipos', $prodtipo);
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
        //
    }
}
