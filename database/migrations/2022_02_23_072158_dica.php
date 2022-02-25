<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dicas', function (Blueprint $table) {
            $table->increments('id_dica');
            $table->unsignedBigInteger('id_fk_user');
            $table->unsignedBigInteger('id_fk_marca');
            $table->unsignedBigInteger('id_fk_modelo');
            $table->string('versao');
            $table->text('dica');
            $table->foreign('id_fk_user')->references('id')->on('users');
            $table->foreign('id_fk_marca')->references('id_marca')->on('marca');
            $table->foreign('id_fk_modelo')->references('id_modelo')->on('modelo');
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
        Schema::drop('dicas');
    }
}
