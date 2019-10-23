<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            //incluimos los atributos básicos de la tabla producto
            $table->string('razon_social');
            $table->string('nif');
            $table->string('niva')->nullable();
            $table->string('direccion')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais');
            $table->string('cp')->nullable();
            $table->string('tlfn')->nullable();
            $table->string('email')->nullable();
            $table->enum('ambito_cl', ['NACIONAL', 'INTRACOMUNITARIO', 'EXTRACOMUNITARIO']);
            $table->enum('tipo_cl', ['PERSONA FISICA', 'PERSONA JURIDICA']);
            $table->enum('forma_pago', ['TRANSFERENCIA', 'PAY PAL', 'CONTADO'])->nullable();
            $table->enum('dias_pago', ['0', '15', '30', '60'])->nullable();
            $table->text('observ')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
