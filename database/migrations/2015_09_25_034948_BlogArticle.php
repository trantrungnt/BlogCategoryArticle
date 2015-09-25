<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BlogArticle', function (Blueprint $table) {
            $table->increments('art_id'); //primary key
            $table->string('title',255);
            $table->text('content');
            $table->string('id_auth',30);
            $table->timestamps();

            //foreign key
            $table->foreign('id_auth')->references('auth_id')->on('Author')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('BlogArticle');
    }
}
