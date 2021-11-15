<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
use App\Models\Prod_tipos;
use Illuminate\Support\Facades\DB;
    use App\Models\Producto;
    
    class Stores extends Controller
    {
        public function __construct(){
            $this->middleware('auth', ['except' => ['getProduct']]);
        }
        /**
         * Show a list of all of the application's users.
         *
         * @return \Illuminate\Http\Response
         */
        static function getTypes(){
            $types = Prod_tipos::orderBy('id')->get();

            return $types;
        }

        static function getProduct(){
            $prods = Producto::orderBy('id')->get();
            $prod = DB::table('productos')->get();
            return $prods;
        }
    }