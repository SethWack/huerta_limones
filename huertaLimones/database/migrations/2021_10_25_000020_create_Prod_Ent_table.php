<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdEntTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Prod_Ent';

    /**
     * Run the migrations.
     * @table Prod_Ent
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
            $table->unsignedBigInteger('PROD_ID');
            $table->unsignedBigInteger('ENT_ID');

            $table->foreign('ENT_ID')
                ->references('id')->on('Entrada')
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
