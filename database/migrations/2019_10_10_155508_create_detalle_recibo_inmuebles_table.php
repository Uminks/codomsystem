<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleReciboInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_recibo_inmuebles', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->float('monto');
            $table->unsignedBigInteger('id_recibo_inmueble');
            
            $table->timestamps();

            $table->foreign('id_recibo_inmueble')->references('id')->on('recibo_inmuebles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_recibo_inmuebles');
    }
}
