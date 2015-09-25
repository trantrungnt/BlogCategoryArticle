<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogCategoryArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BlogCategoryArticle', function (Blueprint $table) {
            //$table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('id_art')->unsigned();
            $table->integer('id_cat')->unsigned();
            $table->timestamps();

            //foreign key
            $table->foreign('id_art')->references('art_id')->on('BlogArticle');
            $table->foreign('id_cat')->references('cat_id')->on('BlogCategory');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('BlogCategoryArticle');
    }
}
