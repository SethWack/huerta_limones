<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFolioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'folios';

    /**
     * Run the migrations.
     * @table Folio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('FOL_ID');
            $table->date('FOL_DATE');
        });
        Schema::table($this->tableName, function (Blueprint $table){
            $table->unsignedBigInteger('PAG_ID');

              $table->foreign('PAG_ID')
                ->references('id')->on('pagos')
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
