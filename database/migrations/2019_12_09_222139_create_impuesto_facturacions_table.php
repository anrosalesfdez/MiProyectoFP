<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpuestoFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuesto_facturacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_cl');
            $table->string('ambito_cl');
            $table->string('impto_act');
            $table->integer('impto_linea');
            $table->integer('retencion_linea');
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
        Schema::dropIfExists('impuesto_facturacions');
    }
}
