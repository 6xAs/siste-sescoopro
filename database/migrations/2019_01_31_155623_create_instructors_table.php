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
            $table->date('data_nascimento')->nullable();
            $table->string('sexo');
            $table->string('estado_civil')->nullable();
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('number')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('experiency')->nullable();
            $table->string('formation')->nullable();
            $table->string('idiomas')->nullable();
            $table->string('informatica')->nullable();
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
