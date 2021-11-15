<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('prod_tipos')->insert([
            'TIPO_NAME' => 'Mexicano'
        ]);
        DB::table('prod_tipos')->insert([
            'TIPO_NAME' => 'Persio'
        ]);
        DB::table('prod_tipos')->insert([
            'TIPO_NAME' => 'Rangpur'
        ]);
        DB::table('prod_tipos')->insert([
            'TIPO_NAME' => 'Calamasi'
        ]);
        DB::table('prod_tipos')->insert([
            'TIPO_NAME' => 'Kaffir'
        ]);
        DB::table('tipo_pagos')->insert([
            'CARD_DESC' => 'MasterCard'
        ]);
        DB::table('tipo_pagos')->insert([
            'CARD_DESC' => 'Visa'
        ]);
        DB::table('tipo_pagos')->insert([
            'CARD_DESC' => 'Amex'
        ]);
        DB::table('productos')->insert([
            'PROD_PRICE' => 20.00,
            'IMG_PATH' => 'lime1.jpg',
            'TIPO_ID' => 1
        ]);
        DB::table('productos')->insert([
            'PROD_PRICE' => 40.00,
            'IMG_PATH' => 'lime2.jpg',
            'TIPO_ID' => 2
        ]);
        DB::table('productos')->insert([
            'PROD_PRICE' => 35.00,
            'IMG_PATH' => 'lime3.jpg',
            'TIPO_ID' => 3
        ]);
        DB::table('productos')->insert([
            'PROD_PRICE' => 20.00,
            'IMG_PATH' => 'lime4.jpg',
            'TIPO_ID' => 5
        ]);
        DB::table('productos')->insert([
            'PROD_PRICE' => 40.00,
            'IMG_PATH' => 'lime6.jpg',
            'TIPO_ID' => 3
        ]);
    }
}
