<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TCPD_USIT', function (Blueprint $table) {
            $table->increments('ID_USIT');
            $table->unsignedInteger('FK_CPD_PARA_IP_USIT_PI'); //PRIVILEGIO_ID
            $table->integer('APP_ID_HISTORICO')->nullable();
            $table->unsignedInteger('FK_CPD_ITEM_II_USIT_II');
            $table->unsignedInteger('FK_CPD_USUA_IU_USIT_UI');
            //$table->boolean('LECTURA');
            //$table->boolean('ACTUALIZACION');
            //$table->boolean('REGENERACION');
            $table->integer('AUD_ESTADO');
            $table->timestamp('AUD_FECHA');
            $table->integer('AUD_USUARIO');
            $table->timestamp('AUD_BAJA_FECHA')->nullable();
            $table->integer('AUD_BAJA_USUARIO')->nullable();
            $table->foreign('FK_CPD_PARA_IP_USIT_PI')->references('ID_PARA')->on('TPAR_PARA');
            $table->foreign('APP_ID_HISTORICO')->references('ID_USIT')->on('TCPD_USIT');
            $table->foreign('FK_CPD_ITEM_II_USIT_II')->references('ID_ITEM')->on('TCPD_ITEM');
            $table->foreign('FK_CPD_USUA_IU_USIT_UI')->references('ID_USUA')->on('TCPD_USUA');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TCPD_USIT');
    }
}
