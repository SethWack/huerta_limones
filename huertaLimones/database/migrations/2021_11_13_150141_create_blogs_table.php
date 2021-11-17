<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'blogs';
    /**
     * Run the migrations.
     * @table Blogs
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('BLOG_SLUG');
            $table->string('BLOG_TITLE');
            $table->longText('BLOG_DESC');
            $table->string('BLOG_TEXT');
            $table->string('BLOG_IMG');
            $table->timestamps();


        });
        Schema::table('blogs', function (Blueprint $table){
            $table->unsignedBigInteger('USER_ID');

              $table->foreign('USER_ID')
                ->references('id')->on('users')
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
        Schema::dropIfExists('blogs');
    }
}
