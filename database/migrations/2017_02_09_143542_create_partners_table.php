<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners',function(Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id');
            $table->string('image');
            $table->integer('order');
            $table->boolean('status');
            $table->string('title');
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
        Schema::drop('partners');
    }
}
