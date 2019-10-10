<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReciboInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibo_inmuebles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_inmueble');
            $table->float('monto');

            $table->timestamps();

            $table->foreign('id_inmueble')->references('id')->on('inmuebles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recibo_inmuebles');
    }
}
