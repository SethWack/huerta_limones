<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Entradas;
use App\Models\Entregas;
use App\Models\Pag_ents;
use App\Models\Pag_prods;
use App\Models\Pagos;
use App\Models\Prod_ents;
use App\Models\Prod_sals;
use App\Models\Prod_tipos;
use App\Models\Producto;
use App\Models\Reportes;
use App\Models\Salidas;
use App\Models\Tipo_pagos;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller
{
    public $chk1 = false;
    public $chk2 = false;
    public $chk3 = false;
    public $chk4 = false;
    public $chk5 = false;
    public $chk6 = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = Reportes::select()->get();
        return view('livewire.reportes')
            ->with('reports', $report);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.reporte-export');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if($request['usuarios'] == 1)
            $this->chk1 = true;
        } catch (\Throwable $th) {
        }
        try {
            if($request['productos'] == 2)
            $this->chk2 = true;
        } catch (\Throwable $th) {
        }
        try {
            if($request['pagos'] == 3)
            $this->chk3 = true;
        } catch (\Throwable $th) {
        }
        try {
            if($request['entradas'] == 4)
            $this->chk4 = true;
        } catch (\Throwable $th) {
        }
        try {
            if($request['salidas'] == 5)
            $this->chk5 = true;
        } catch (\Throwable $th) {
        }
        try {
            if($request['blogs'] == 6)
            $this->chk6 = true;
        } catch (\Throwable $th) {
        }
        Reportes::create(['REPORT_PDF' => "null"]);
        $rep = Reportes::latest()->first();

        return redirect('/reportes/'.$rep['id'])
            ->with('chk1', $this->chk1)
            ->with('chk2', $this->chk2)
            ->with('chk3', $this->chk3)
            ->with('chk4', $this->chk4)
            ->with('chk5', $this->chk5)
            ->with('chk6', $this->chk6);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::select()->get();
        $tipo_pagos = Tipo_pagos::select()->get();
        $productos = Producto::select()->get();
        $prod_tipos = Prod_tipos::select()->get();
        $prod_sals = Prod_sals::select()->get();
        $prod_ents = Prod_ents::select()->get();
        $entradas = Entradas::select()->get();
        $salidas = Salidas::select()->get();
        $entregas = Entregas::select()->get();
        $pagos = Pagos::select()->get();
        $pag_ents = Pag_ents::select()->get();
        $pag_prods = Pag_prods::select()->get();
        $blogs = Blogs::select()->get();
        return view('livewire.report-final')
            ->with('users', $users)
            ->with('tipo_pagos', $tipo_pagos)
            ->with('productos', $productos)
            ->with('prod_tipos', $prod_tipos)
            ->with('prod_sals', $prod_sals)
            ->with('prod_ents', $prod_ents)
            ->with('entradas', $entradas)
            ->with('salidas', $salidas)
            ->with('entregas', $entregas)
            ->with('pagos', $pagos)
            ->with('pag_ents', $pag_ents)
            ->with('pag_prods', $pag_prods)
            ->with('blogs', $blogs)
            ->with('id', $id);
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
