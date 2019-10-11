<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_inmuebles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_recibo');
            $table->foreign('id_recibo')->references('id')->on('recibos');
            $table->unsignedBigInteger('id_tipo_pagos');
            $table->foreign('id_tipo_pagos')->references('id')->on('tipo_pagos');
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
        Schema::dropIfExists('pagos_inmuebles');
    }
}
