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
            $table->string('modalidade')->nullable();
            $table->integer('edital')->nullable();
            $table->text('objeto')->nullable();
            $table->string('status')->nullable();
            $table->string('telefone_fixo')->nullable();
            $table->string('telefone_celular')->nullable();
            $table->string('email')->nullable();
            $table->time('hora_abertura')->nullable();
            $table->date('data')->nullable();
            $table->string('name_file_01')->nullable();
            $table->date('data_file_01')->nullable();
            $table->string('file_01')->nullable();
            $table->string('name_file_02')->nullable();
            $table->date('data_file_02')->nullable();
            $table->string('file_02')->nullable();
            $table->string('name_file_03')->nullable();
            $table->date('data_file_03')->nullable();
            $table->string('file_03')->nullable();
            $table->string('name_file_04')->nullable();
            $table->date('data_file_04')->nullable();
            $table->string('file_04')->nullable();
            $table->string('name_file_05')->nullable();
            $table->date('data_file_05')->nullable();
            $table->string('file_05')->nullable();
            $table->string('name_file_06')->nullable();
            $table->date('data_file_06')->nullable();
            $table->string('file_06')->nullable();
            $table->string('name_file_07')->nullable();
            $table->date('data_file_07')->nullable();
            $table->string('file_07')->nullable();
            $table->string('name_file_08')->nullable();
            $table->date('data_file_08')->nullable();
            $table->string('file_08')->nullable();
            $table->string('name_file_09')->nullable();
            $table->date('data_file_09')->nullable();
            $table->string('file_09')->nullable();
            $table->string('name_file_010')->nullable();
            $table->date('data_file_010')->nullable();
            $table->string('file_010')->nullable();
            $table->string('name_file_011')->nullable();
            $table->date('data_file_011')->nullable();
            $table->string('file_011')->nullable();
            $table->string('name_file_012')->nullable();
            $table->date('data_file_012')->nullable();
            $table->string('file_012')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
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
