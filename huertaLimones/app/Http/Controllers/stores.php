<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    
    class storeController extends Controller
    {
        /**
         * Show a list of all of the application's users.
         *
         * @return \Illuminate\Http\Response
         */
        public function getTypes(){
            $types = DB::table('Prod_Tipo')->get();

            return $types;
        }

        public function getProduct(){
            $prod = DB::table('Producto')->get();
            return $prod;
        }
    }