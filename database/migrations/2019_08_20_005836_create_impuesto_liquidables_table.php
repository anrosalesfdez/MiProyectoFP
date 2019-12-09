<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpuestoLiquidablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuesto_liquidables', function (Blueprint $table) {
            //tabla general al programa
            //DATOS
            //1 - GE- general - 21
            //2 - RE -reducido - 10
            //3 - SU - superreducido - 04
            //4 - EX - exento - 00
            //5 - NO - no sujeto - 00
            $table->increments('id');
            $table->string('codigo');
            $table->string('descripcion')->nullable();
            $table->integer('valor');
            
            //fecha de creacion
            $table->timestamps();
            
            //trabaja con eliminación en vistas, no en tabla
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impuesto_liquidables');
    }
}
