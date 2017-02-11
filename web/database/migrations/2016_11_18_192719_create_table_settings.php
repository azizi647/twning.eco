<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('logo')->nullable();
            $table->string('site_name')->nullable();
            $table->text('meta_key')->nullable();
            $table->text('meta_descr')->nullable();
            $table->text('address')->nullable();
            $table->string('site_email');
            $table->string('site_phone');
            $table->string('site_mobile');
            $table->string('contact_map');
            $table->string('facebook_url');
            $table->string('instagram_url');
            $table->string('twetter_url');
            $table->string('copyright');
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
       Schema::dropIfExists('settings');
    }
}
