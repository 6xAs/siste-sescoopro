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
            $table->integer('edital', null);
            $table->text('objeto');
            $table->string('status', null);
            $table->string('telefone_fixo', null);
            $table->string('telefone_celular', null);
            $table->string('email', null);
            $table->time('hora_abertura', null);
            $table->date('data', null);
            $table->string('name_file_01', null);
            $table->date('data_file_01', null);
            $table->string('file_01', null);
            $table->string('name_file_02', null);
            $table->date('data_file_02', null);
            $table->string('file_02', null);
            $table->string('name_file_03', null);
            $table->date('data_file_03', null);
            $table->string('file_03', null);
            $table->string('name_file_04', null);
            $table->date('data_file_04', null);
            $table->string('file_04', null);
            $table->string('name_file_05', null);
            $table->date('data_file_05', null);
            $table->string('file_05', null);
            $table->string('name_file_06', null);
            $table->date('data_file_06', null);
            $table->string('file_06', null);
            $table->string('name_file_07', null);
            $table->date('data_file_07', null);
            $table->string('file_07', null);
            $table->string('name_file_08', null);
            $table->date('data_file_08', null);
            $table->string('file_08', null);
            $table->string('name_file_09', null);
            $table->date('data_file_09', null);
            $table->string('file_09', null);
            $table->string('name_file_010', null);
            $table->date('data_file_010', null);
            $table->string('file_010', null);
            $table->string('name_file_011', null);
            $table->date('data_file_011', null);
            $table->string('file_011', null);
            $table->string('name_file_012', null);
            $table->date('data_file_012', null);
            $table->string('file_012', null);
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
