<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TCPD_USUA', function (Blueprint $table) {
            $table->increments('ID_USUA');
            $table->unsignedInteger('APP_ID_HISTORICO')->nullable();
            $table->string('NOMBRE');
            $table->string('APELLIDO');
            $table->string('USUARIO_ALIAS');
            $table->string('TELEFONO');
            $table->string('EMAIL');
            $table->text('PASSWORD');
            $table->integer('AUD_ESTADO');
            $table->timestamp('AUD_FECHA');
            $table->integer('AUD_USUARIO')->nullable();
            $table->timestamp('AUD_BAJA_FECHA')->nullable();
            $table->integer('AUD_BAJA_USUARIO')->nullable();
            $table->foreign('APP_ID_HISTORICO')->references('ID_USUA')->on('TCPD_USUA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TCPD_USUA');
    }
}
