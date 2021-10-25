<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarProdTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Car_Prod';

    /**
     * Run the migrations.
     * @table Car_Prod
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
        Schema::table($this->tableName, function(Blueprint $table){
            $table->unsignedBigInteger('CAR_ID');
            $table->unsignedBigInteger('PROD_ID');

            $table->foreign('CAR_ID')
                ->references('id')->on('Carrito')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('PROD_ID')
                ->references('id')->on('Producto')
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
