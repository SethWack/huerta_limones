<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pagos';

    /**
     * Run the migrations.
     * @table Pago
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('PAG_DATE', 45);
        });
        Schema::table($this->tableName, function(Blueprint $table){
            $table->unsignedBigInteger('USER_ID');
            $table->unsignedBigInteger('CARD_ID');

            $table->foreign('USER_ID')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('CARD_ID')
                ->references('id')->on('tipo_pagos')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
