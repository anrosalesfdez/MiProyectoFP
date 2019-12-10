<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLineas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('factura_id')->unsigned();
            $table->integer('ejercicio');
            $table->string('serie');
            $table->integer('numero_fra');
            $table->integer('numero');
            $table->integer('producto_id')->unsigned();
            $table->string('producto_nombre');
            $table->string('producto_descripcion');
            $table->string('producto_precio');
            $table->string('producto_unidad');
            $table->string('producto_act_impto');
            $table->float('cantidad');
            $table->integer('impuesto');
            $table->integer('retencion');
            $table->timestamps();

            //trabaja con eliminación en vistas, no en tabla
            $table->softDeletes();

            //foreign key
            $table->foreign('factura_id')
                  ->references('id')
                  ->on('factura_cabeceras')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('emisores')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineas');
    }
}
