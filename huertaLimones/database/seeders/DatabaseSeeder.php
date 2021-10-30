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
        DB::table('Prod_Tipo')->insert([
            'TIPO_NAME' => 'Mexicano'
        ]);
        DB::table('Prod_Tipo')->insert([
            'TIPO_NAME' => 'Persio'
        ]);
        DB::table('Prod_Tipo')->insert([
            'TIPO_NAME' => 'Rangpur'
        ]);
        DB::table('Prod_Tipo')->insert([
            'TIPO_NAME' => 'Calamasi'
        ]);
        DB::table('Prod_Tipo')->insert([
            'TIPO_NAME' => 'Kaffir'
        ]);
        DB::table('Tipo_Pago')->insert([
            'CARD_DESC' => 'MasterCard'
        ]);
        DB::table('Tipo_Pago')->insert([
            'CARD_DESC' => 'Visa'
        ]);
        DB::table('Tipo_Pago')->insert([
            'CARD_DESC' => 'Amex'
        ]);
    }
}
