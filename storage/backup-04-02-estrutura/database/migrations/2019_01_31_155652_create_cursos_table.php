<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('curso');
            $table->string('instrutor');
            $table->string('carga_h');
            $table->time('horario');
            $table->string('cidade');
            $table->string('local');
            $table->text('publico_alvo');
            $table->text('conteudo_programatico');
            $table->date('data');
            $table->string('file_01');
            $table->string('file_02');
            $table->string('file_03');
            $table->string('video');
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
        Schema::dropIfExists('cursos');
    }
}
