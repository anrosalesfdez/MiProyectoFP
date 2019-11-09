<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('nif');
            $table->string('niva');
            $table->string('nombrefiscal');
            $table->string('nombrecomercial');
            $table->string('email');
            $table->string('telefono');
            $table->string('direccionfiscal');
            $table->string('cp');
            $table->string('ciudad');
            $table->string('pais');
            //trabaja con eliminación en vistas, no en tabla
            $table->softDeletes();
            
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
        Schema::dropIfExists('usuario_facturas');
    }
}
