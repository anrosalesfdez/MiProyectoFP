<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();
            $table->string('titulo');
            $table->string('descripcion')->nullable();
            $table->string('serie')->nullable()->unique(); //la introducirá el usuario
            $table->string('impuesto'); //general, reducido, superreducido, operación exenta, operación no sujeta.
            
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
        Schema::dropIfExists('actividades');
    }
}
