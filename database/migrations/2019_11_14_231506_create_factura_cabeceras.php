<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaCabeceras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_cabeceras', function (Blueprint $table) {
            $table->integer('ejercicio');
            $table->string('serie');
            $table->integer('numero');
            $table->date('fecha_fra');
            $table->bigInteger('cliente_id');
            $table->float('total');
            $table->boolean('anulada')->default(false);
            $table->boolean('pagada')->default(false);
            $table->boolean('presentada')->default(false);
            $table->string('moneda');
            
            $table->timestamps();

            //trabaja con eliminación en vistas, no en tabla
            $table->softDeletes();

            //PK
            $table->primary(['ejercicio', 'serie', 'numero', 'fecha_fra']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_cabeceras');
    }
}
