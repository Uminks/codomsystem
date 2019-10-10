<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserCondominium extends Migration
{
      public function up()
    {
        Schema::table('condominium', function (Blueprint $table) {
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('condominium', function (Blueprint $table) {
            $table->dropColumn('id_user');
        });
    }
}
