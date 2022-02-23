<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tips', function (Blueprint $table) {
            $table->increments('id_tips');
            $table->unsignedBigInteger('id_fk_user');
            $table->unsignedBigInteger('id_fk_auto');
            $table->foreign('id_fk_user')->references('id')->on('users');
            $table->foreign('id_fk_auto')->references('id_auto')->on('autos');
            $table->text('tip');
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
        Schema::drop('tips');
    }
}
