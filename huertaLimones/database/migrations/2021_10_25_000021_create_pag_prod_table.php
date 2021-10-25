<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagProdTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pag_prod';

    /**
     * Run the migrations.
     * @table pag_prod
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
            $table->unsignedBigInteger('PAG_ID');
            $table->unsignedBigInteger('PROD_ID');

            $table->foreign('PAG_ID')
                ->references('id')->on('Pago')
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
