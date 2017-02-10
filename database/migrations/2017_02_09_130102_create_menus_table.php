<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus',function(Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id');
            $table->integer('parent_id')->default(0);
            $table->integer('order');
            $table->integer('menu_type')->default(0);
            $table->boolean('status');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['top','left','bottom']);
            $table->enum('lang', ['az','en']);
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
        Schema::drop('menus');
    }
}
