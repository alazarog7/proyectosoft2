<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TCPD_ITEM', function (Blueprint $table) {
            $table->increments('ID_ITEM');
            $table->unsignedInteger('FK_CPD_PARA_IP_ITEM_PI');
            $table->unsignedInteger('APP_ID_HISTORICO')->nullable();
            $table->unsignedInteger('FK_CPD_PADRE')->nullable();
            $table->string('CODIGO_ACTIVO')->nullable();
            $table->string('NOMBRE');
            $table->string('IP')->nullable();
            $table->string('CODIGO_SAF')->nullable();
            $table->string('USUARIO_ALIAS')->nullable();
            $table->text('PASSWORD')->nullable();
            $table->text('DESCRIPCION')->nullable();
            $table->integer('AUD_ESTADO');
            $table->timestamp('AUD_FECHA');
            $table->integer('AUD_USUARIO');
            $table->timestamp('AUD_BAJA_FECHA')->nullable();
            $table->integer('AUD_BAJA_USUARIO')->nullable();
            $table->foreign('APP_ID_HISTORICO')->references('ID_ITEM')->on('TCPD_ITEM');
            $table->foreign('FK_CPD_PARA_IP_ITEM_PI')->references('ID_PARA')->on('TPAR_PARA');
            $table->foreign('FK_CPD_PADRE')->references('ID_ITEM')->on('TCPD_ITEM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TCPD_ITEM');
    }
}
