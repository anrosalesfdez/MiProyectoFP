<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            //datos identificadores
            $table->increments('id');
            $table->bigInteger('users_id')->unsigned();
            $table->integer('actividades_id')->unsigned();
            //datos de un producto
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->string('unidad');

            //fecha de creacion
            $table->timestamps();

            //trabaja con eliminación en vistas, no en tabla
            $table->softDeletes();

            // Remove the primary key
            // $table->dropPrimary("id");
            //pk
            // $table->primary(['id', 'users_id']);

            //foreign key
            $table->foreign('users_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('productos');
    }
}
