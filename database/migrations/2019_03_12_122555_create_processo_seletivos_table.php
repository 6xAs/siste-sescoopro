<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessoSeletivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_seletivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number_edital')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('observacao')->nullable();
            $table->date('data')->nullable();
            $table->string('file_01')->nullable();
            $table->string('file_02')->nullable();
            $table->string('file_03')->nullable();
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
        Schema::dropIfExists('processo_seletivos');
    }
}
