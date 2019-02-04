<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->date('data_nascimento');
            $table->char('sexo');
            $table->string('estado_civil');
            $table->string('rua');
            $table->string('bairro');
            $table->string('number');
            $table->string('objetivo');
            $table->string('experiency');
            $table->string('formation');
            $table->string('idiomas');
            $table->string('informatica');
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
        Schema::dropIfExists('instructors');
    }
}
