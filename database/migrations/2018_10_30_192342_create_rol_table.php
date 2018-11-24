<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TCPD_ROL', function (Blueprint $table) {
            $table->increments('ID_ROL');
            $table->unsignedInteger('FK_PARA_IP_ROL_RI');
            $table->unsignedInteger('FK_USUA_ID_USUA_UI');
            $table->unsignedInteger('APP_ID_HISTORICO')->nullable();
            $table->integer('AUD_ESTADO');
            $table->timestamp('AUD_FECHA');
            $table->integer('AUD_USUARIO')->nullable();
            $table->timestamp('AUD_BAJA_FECHA')->nullable();
            $table->integer('AUD_BAJA_USUARIO')->nullable();
            $table->foreign('FK_PARA_IP_ROL_RI')->references('ID_PARA')->on('TPAR_PARA');
            $table->foreign('FK_USUA_ID_USUA_UI')->references('ID_USUA')->on('TCPD_USUA');
            $table->foreign('APP_ID_HISTORICO')->references('ID_ROL')->on('TCPD_ROL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TCPD_ROLE');
    }
}
