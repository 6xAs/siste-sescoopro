<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaCoopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_coops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_cooperativa')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('cnpj')->nullable();
            $table->date('data_contribuicao')->nullable();
            $table->integer('numero_registro')->nullable();
            $table->date('data_registro')->nullable();
            $table->integer('numero_cooperados')->nullable();
            $table->integer('numero_funcionarios')->nullable();
            $table->string('nome_presidente')->nullable();
            $table->integer('cpf_presidente')->nullable();
            $table->integer('cel_presidente')->nullable();
            $table->string('mandato')->nullable();
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('numero')->nullable();
            $table->integer('cep')->nullable();
            $table->integer('telefone_empresarial_1')->nullable();
            $table->integer('telefone_empresarial_2')->nullable();
            $table->string('email')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('atividade_economica')->nullable();
            $table->string('status_cooperativa')->nullable();
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
        Schema::dropIfExists('lista_coops');
    }
}
