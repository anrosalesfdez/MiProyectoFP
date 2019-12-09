<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmisoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emisores', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('users_id')->unsigned();
            //datos de un usuario factura
            $table->string('nif')->nullable()->unique();
            $table->string('niva')->nullable()->unique();
            $table->string('nombre_fiscal')->nullable();
            $table->string('nombre_comercial')->nullable();
            $table->string('direccion_fiscal')->nullable();
            $table->string('direccion_comercial')->nullable();
            $table->string('cp_fiscal')->nullable();
            $table->string('cp_comercial')->nullable();
            $table->string('provincia_fiscal')->nullable();
            $table->string('provincia_comercial')->nullable();
            $table->string('pais_fiscal')->nullable();
            $table->string('pais_comercial')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            
            //fecha de creacion
            $table->timestamps();
            
            //trabaja con eliminación en vistas, no en tabla
            $table->softDeletes();
            
            // Remove the primary key
            // $table->dropPrimary();
            //PK
            // $table->primary(['id', 'users_id']);
            
            //foreign key
            $table->foreign('users_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('emisores');
    }
}
