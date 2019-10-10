<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPeopleCondominiumEstate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('estate', function (Blueprint $table) {
            $table->integer('id_people');
            $table->integer('id_condominium');
            $table->foreign('id_people')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('id_condominium')->references('id')->on('condominium')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('estate', function (Blueprint $table) {
            $table->dropColumn;('id_people');
            $table->dropColumn;('id_condominium');
       });
    }
}
