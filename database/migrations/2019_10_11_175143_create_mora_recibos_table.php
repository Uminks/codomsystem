<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoraRecibosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mora_recibos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_recibo');
            $table->foreign('id_recibo')->references('id')->on('recibos');
            $table->float('monto');
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
        Schema::dropIfExists('mora_recibos');
    }
}
