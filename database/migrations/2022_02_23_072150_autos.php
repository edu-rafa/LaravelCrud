<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Autos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('id_auto');
            $table->string('marca');
            $table->string('modelo');
            $table->string('versao');
            $table->unsignedBigInteger('id_fk_tpv');
            $table->foreign('id_fk_tpv')->references('id_tpv')->on('tipo_veiculos');
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
        Schema::dropIfExists('tipo_veiculos');
    }
}
