<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('title')->nullable();
            $table->string('slider_picture');
            $table->string('project_url')->nullable();
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
        Schema::dropIfExists('sliders');
        
    }
}
