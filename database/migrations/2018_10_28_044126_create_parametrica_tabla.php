<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametricaTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TPAR_PARA', function (Blueprint $table) {
            $table->increments('ID_PARA');
            $table->unsignedInteger('APP_ID_HISTORICO')->nullable();
            $table->string('NOMBRE');
            $table->integer('CATEGORIA');
            $table->integer('AUD_ESTADO');
            $table->timestamp('AUD_FECHA');
            $table->integer('AUD_USUARIO');
            $table->timestamp('AUD_BAJA_FECHA')->nullable();
            $table->integer('AUD_BAJA_USUARIO')->nullable();
            $table->foreign('APP_ID_HISTORICO')->references('ID_PARA')->on('TPAR_PARA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TPAR_PARA');
    }
}
