<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsuarioFacturasNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario_facturas', function (Blueprint $table) {
            $table->string('nif')->nullable()->change();
            $table->string('niva')->nullable()->change();
            $table->string('nombrefiscal')->nullable()->change();
            $table->string('nombrecomercial')->nullable()->change();
            $table->string('telefono')->nullable()->change();
            $table->string('direccionfiscal')->nullable()->change();
            $table->string('cp')->nullable()->change();
            $table->string('ciudad')->nullable()->change();
            $table->string('pais')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario_facturas', function (Blueprint $table) {
            //
        });
    }
}
