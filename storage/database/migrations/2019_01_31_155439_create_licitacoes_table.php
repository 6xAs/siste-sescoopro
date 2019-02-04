<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicitacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number_process');
            $table->string('modalidade');
            $table->integer('edital');
            $table->text('objeto');
            $table->string('status');
            $table->string('telefone_fixo');
            $table->string('telefone_celular');
            $table->string('temail');
            $table->time('hora_abertura');
            $table->date('data');
            $table->string('file_01');
            $table->string('file_02');
            $table->string('file_03');
            $table->string('file_04');
            $table->string('file_05');
            $table->string('file_06');
            $table->string('file_07');
            $table->string('file_08');
            $table->string('file_09');
            $table->string('file_10');
            $table->string('file_11');
            $table->string('file_12');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('licitacoes');
    }
}
