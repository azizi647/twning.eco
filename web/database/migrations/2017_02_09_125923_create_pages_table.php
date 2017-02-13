<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages',function(Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id');
            $table->integer('menu_id');
            $table->enum('lang', ['az','en']);
            $table->string('title');
            $table->text('subtitle');
            $table->text('text');
            $table->string('keywords');
            $table->string('link');
            $table->integer('order')->default(0);
            $table->tinyInteger('show_index')->default(0);
            $table->string('file')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::drop('pages');
    }
}
