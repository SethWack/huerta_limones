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
//use Barryvdh\DomPDF\Facade as PDF;
use PDF;

class ReportController extends Controller
{
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

        session()->forget('chk1');
        session()->forget('chk2');
        session()->forget('chk3');
        session()->forget('chk4');
        session()->forget('chk5');
        session()->forget('chk6');

        try {
            if($request['usuarios'] == 1)
            session(['chk1' =>true]);
           } catch (\Throwable $th) {
        }
        try {
            if($request['productos'] == 2)
            session(['chk2' =>true]);
        } catch (\Throwable $th) {
        }
        try {
            if($request['pagos'] == 3)
            session(['chk3' =>true]);
        } catch (\Throwable $th) {
        }
        try {
            if($request['entradas'] == 4)

            session(['chk4' =>true]);
        } catch (\Throwable $th) {
        }
        try {
            if($request['salidas'] == 5)
            session(['chk5' =>true]);
        } catch (\Throwable $th) {
        }
        try {
            if($request['blogs'] == 6)
            session(['chk6' =>true]);
        } catch (\Throwable $th) {
        }


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
            ->with('blogs', $blogs);


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
  
       /* return view('livewire.report-final-pdf')
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
            ->with('blogs', $blogs);
            */
            $pdf = app()->make('dompdf.wrapper');
            $pdf->loadView('livewire.report-final-pdf', compact('users','tipo_pagos','productos','prod_tipos','prod_sals',
            'prod_ents','entradas','salidas','entregas','pagos','pag_ents','pag_prods','blogs'))->setPaper('letter', 'landscape'); 
            return $pdf->download('reportes.pdf');
       // return $pdf->stream('listado_productos');

         
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
        dd('edicion');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
  
        return view('livewire.report-final-pdf')
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
            ->with('blogs', $blogs);
            //->with('id', $id);
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


    // Generate PDF
    public function createPDF() {

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
  
        return view('livewire.report-final-pdf')
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
            ->with('blogs', $blogs);

    /*
        // retreive all records from db
        $productos = Producto::all();
        $pdf = app()->make('dompdf.wrapper');
       

        $pdf->loadView('reportes.productos', compact('productos'))->setPaper('letter', 'landscape'); 
        return $pdf->download('pdf_file.pdf');
       // return $pdf->stream('listado_productos');
       */
    }


}
