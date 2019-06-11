<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('local')->nullable();
            $table->date('data')->nullable();
            $table->string('image_01')->nullable();
            $table->string('image_02')->nullable();
            $table->string('image_03')->nullable();
            $table->string('image_04')->nullable();
            $table->string('image_05')->nullable();
            $table->string('image_06')->nullable();
            $table->string('image_07')->nullable();
            $table->string('image_08')->nullable();
            $table->string('image_09')->nullable();
            $table->string('image_010')->nullable();
            $table->string('image_011')->nullable();
            $table->string('image_012')->nullable();
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
        Schema::dropIfExists('galeries');
    }
}
