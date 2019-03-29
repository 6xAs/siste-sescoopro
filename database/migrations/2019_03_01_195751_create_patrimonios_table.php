<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimoniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_patrimonio');
            $table->integer('num_patrimonio');
            $table->string('marca')->nullable();
            $table->integer('num_nota_fiscal')->nullable();
            $table->date('data_compra')->nullable();
            $table->string('ano_compra')->nullable();
            $table->integer('num_serie')->nullable();
            $table->integer('garantia')->nullable();
            $table->decimal('valor')->nullable();
            $table->decimal('situacao')->nullable();
            $table->string('usuario')->nullable();
            $table->string('setor')->nullable();
            $table->date('data_baixa')->nullable();
            $table->string('classe')->nullable();
            $table->string('empresa')->nullable();
            $table->integer('cnpj')->nullable();
            $table->string('fone_empresa')->nullable();
            $table->string('email_empresa')->nullable();
            $table->string('vendedor')->nullable();
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('numero')->nullable();
            $table->string('description')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('patrimonios');
    }
}
