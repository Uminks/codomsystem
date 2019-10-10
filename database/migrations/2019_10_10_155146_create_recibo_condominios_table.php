<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReciboCondominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibo_condominios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('monto');

            $table->unsignedBigInteger('id_condominio');

            $table->timestamps();

            $table->foreign('id_condominio')->references('id')->on('condominios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recibo_condominios');
    }
}
