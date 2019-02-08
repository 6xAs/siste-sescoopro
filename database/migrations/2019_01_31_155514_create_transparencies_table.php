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
            $table->string('docMain');
            $table->string('subDoc');
            $table->string('document_name', null);
            $table->string('ano', null);
            $table->string('file_01', null);
            $table->string('file_02', null);
            $table->string('file_03', null);
            $table->string('file_04', null);
            $table->integer('user_id', null)->unsigned();
            $table->foreign('user_id', null)->references('id')->on('users')->onDelete('cascade');
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
