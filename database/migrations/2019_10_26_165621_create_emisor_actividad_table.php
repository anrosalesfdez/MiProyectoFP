<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmisorActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emisores_actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('users_id')->unsigned();
            $table->integer('emisores_id')->unsigned();
            $table->integer('actividades_id')->unsigned();
             //fecha de creacion
             $table->timestamps();
             //trabaja con eliminación en vistas, no en tabla
             $table->softDeletes();

            //PK
            // $table->primary(['users_id', 'emi_nif', 'actividades_id']);
             
            //foreign key
            $table->foreign('users_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('emisores_id')
                ->references('id')
                ->on('emisores')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('actividades_id')
                  ->references('id')
                  ->on('actividades')
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
        Schema::dropIfExists('emisores_actividades');
    }
}
