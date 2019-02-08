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
            $table->date('data_nascimento',  null);
            $table->char('sexo', null);
            $table->string('estado_civil', null);
            $table->string('rua', null);
            $table->string('bairro', null);
            $table->string('number', null);
            $table->string('objetivo', null);
            $table->string('experiency', null);
            $table->string('formation', null);
            $table->string('idiomas', null);
            $table->string('informatica', null);
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
