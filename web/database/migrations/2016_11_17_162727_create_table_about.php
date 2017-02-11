<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('about', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('title')->nullable();
            $table->text('about_hompage');
            $table->string('home_picture');
            $table->text('about');
            $table->enum('lang', ['az','en']);
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('about');
    }
}
