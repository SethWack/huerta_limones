<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagEntTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Pag_Ent';

    /**
     * Run the migrations.
     * @table Pag_Ent
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
            $table->unsignedBigInteger('PAG_ID');
            $table->unsignedBigInteger('ENTG_ID');

            $table->foreign('PAG_ID')
                ->references('id')->on('Pago')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ENTG_ID')
                ->references('id')->on('Entrega')
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
