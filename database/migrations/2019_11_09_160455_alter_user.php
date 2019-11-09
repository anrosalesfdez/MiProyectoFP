<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('telefono')->nullable();;
            $table->date('fechanacimiento')->nullable();;
            $table->string('nif');
            $table->string('nombrefiscal');
            $table->string('nombrecomercial');
            $table->string('direccionfiscal');
            $table->string('cp');
            $table->string('ciudad');
            $table->string('pais');
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
