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
            $table->text('publico_alvo')->nullable();
            $table->text('conteudo_programatico')->nullable();
            $table->date('data')->nullable();
            $table->string('status_curso')->nullable();
            $table->string('periodo_inscricao')->nullable();
            $table->string('file_01')->nullable();
            $table->string('file_02')->nullable();
            $table->string('file_03')->nullable();
            $table->string('video')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('instructors')->onDelete('cascade');
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
