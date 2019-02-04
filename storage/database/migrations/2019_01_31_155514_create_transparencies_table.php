<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransparenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transparencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_documento');
            $table->string('sub_tipo_document');
            $table->string('document_name');
            $table->string('ano');
            $table->string('file_01');
            $table->string('file_02');
            $table->string('file_03');
            $table->string('file_04');
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
        Schema::dropIfExists('transparencies');
    }
}
