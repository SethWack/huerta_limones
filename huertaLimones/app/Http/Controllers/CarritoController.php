<?php

namespace App\Http\Controllers;

use App\Models\Car_prods;
use App\Models\Carritos;
use App\Models\Prod_tipos;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_cars;

class CarritoController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.carritos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = Producto::where('id', $request['PROD_ID'])->first();
        $user = User::where('id',$request['USER_ID'])->first();
        $user_car = User_cars::where('USER_ID', $user['id'])->first();
        $carrito = Carritos::where('id', $user_car['CAR_ID'])->first();
        $request->validate([
            'PROD_ID' => 'required',
            'PROD_AMMOUNT' => 'required'
        ]);
        Car_prods::create([
            'CAR_ID' => $carrito['id'],
            'PROD_ID' => $prod['id'],
            'PROD_AMMOUNT' => $request['PROD_AMMOUNT']
        ]);
        return redirect('/store')->with('message', 'Agregado al Carrito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->first();
        $user_car = User_cars::where('USER_ID', $user['id'])->first();
        $carrito = Carritos::where('id', $user_car['CAR_ID'])->first();
        $car_prods = Car_prods::where('CAR_ID', $carrito['id'])->get();
        $products = Producto::select()->get();
        $prod = Prod_tipos::select()->get();
        return view('livewire.carritos')
            ->with('user', $user)
            ->with('car_prods', $car_prods)
            ->with('productos', $products)
            ->with('tipos', $prod);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Producto::where('id', $id)->first();
        $car_prods = Car_prods::where('PROD_ID', $productos['id']);
        return view('livewire.store-purchase');
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
