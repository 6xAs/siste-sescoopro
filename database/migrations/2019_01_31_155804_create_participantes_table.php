<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('password');
            $table->string('sexo')->nullable();
            $table->integer('rg')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('nome_cooperativa')->nullable();
            $table->date('data_admissao')->nullable();
            $table->date('data_demissao')->nullable();
            $table->string('setor')->nullable();
            $table->string('funcao')->nullable();
            $table->string('telefone_residencial')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefone_comercial')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('cor')->nullable();
            $table->string('escolaridade')->nullable();
            $table->string('situacao_ocupacional')->nullable();
            $table->string('publico_beneficiario')->nullable();
            $table->string('faixa_renda')->nullable();
            $table->string('necessidade_especial')->nullable();
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('numero')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('cep')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('cursos')->onDelete('cascade');
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
        Schema::dropIfExists('participantes');
    }
}
