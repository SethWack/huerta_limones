<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'TIPO_NAME' => 'Limon'
        ]);
        DB::table('prod_tipos')->insert([
            'TIPO_NAME' => 'Jabon'
        ]);
        DB::table('prod_tipos')->insert([
            'TIPO_NAME' => 'Hoja de Te'
        ]);
        DB::table('prod_tipos')->insert([
            'TIPO_NAME' => 'Arbolito'
        ]);
        DB::table('prod_tipos')->insert([
            'TIPO_NAME' => 'Semilla'
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
            'TIPO_ID' => 1,
            'PROD_AMMOUNT' => 200
        ]);
        DB::table('productos')->insert([
            'PROD_PRICE' => 40.00,
            'IMG_PATH' => 'lime2.jpg',
            'TIPO_ID' => 2,
            'PROD_AMMOUNT' => 100
        ]);
        DB::table('productos')->insert([
            'PROD_PRICE' => 35.00,
            'IMG_PATH' => 'lime3.jpg',
            'TIPO_ID' => 3,
            'PROD_AMMOUNT' => 50
        ]);
        DB::table('productos')->insert([
            'PROD_PRICE' => 20.00,
            'IMG_PATH' => 'lime4.jpg',
            'TIPO_ID' => 5,
            'PROD_AMMOUNT' => 139
        ]);
        DB::table('productos')->insert([
            'PROD_PRICE' => 40.00,
            'IMG_PATH' => 'lime6.jpg',
            'TIPO_ID' => 3,
            'PROD_AMMOUNT' => 20
        ]);
        DB::table('users')->insert([
            'name' => 'ADMIN1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('qwerty_12345678'),
            'admin' => True
        ]);
        DB::table('users')->insert([
            'name' => 'userTest',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'admin' => False
        ]);
        DB::table('blogs')->insert([
            'BLOG_SLUG' => 'Test1',
            'BLOG_TITLE' => 'Test1 Title',
            'BLOG_DESC' => 'This is a description',
            'BLOG_TEXT' => 'This is a longer text: Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias deserunt beatae, facere iste tempore voluptates enim cupiditate commodi, perferendis inventore consequatur minima! Atque, ex aperiam placeat magnam cupiditate vero ipsa?',
            'BLOG_IMG' => '1.jpg',
            'USER_ID' => '1'
        ]);
        DB::table('carritos')->insert([
            'id' => 1,
        ]);
        DB::table('user_cars')->insert([
            'USER_ID' => 1,
            'CAR_ID' => 1,
        ]);
    }
}
