<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdSalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'prod_sals';

    /**
     * Run the migrations.
     * @table Prod_Sal
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
        Schema::table($this->tableName, function (Blueprint $table){
            $table->unsignedBigInteger('PROD_ID');
            $table->unsignedBigInteger('SAL_ID');


            $table->foreign('SAL_ID')
                ->references('id')->on('salidas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('PROD_ID')
                ->references('id')->on('productos')
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
