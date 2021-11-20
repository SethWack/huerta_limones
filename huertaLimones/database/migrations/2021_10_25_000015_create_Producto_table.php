<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'productos';

    /**
     * Run the migrations.
     * @table Producto
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('PROD_PRICE', 45);
            $table->string('IMG_PATH');
            $table->integer('PROD_AMMOUNT');
            $table->timestamps();
        });
        Schema::table($this->tableName, function(Blueprint $table){

            $table->unsignedBigInteger('TIPO_ID');
            $table->foreign('TIPO_ID')
                ->references('id')->on('prod_tipos')
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
