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
            $table->increments('id');
            $table->bigInteger('users_id')->unsigned();
            //incluimos los atributos básicos de la tabla producto
            $table->string('razon_social');
            $table->string('nif')->unique();
            $table->string('niva')->nullable()->unique();
            $table->string('direccion')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais');
            $table->string('cp')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->enum('ambito', ['NACIONAL', 'INTRACOMUNITARIO', 'EXTRACOMUNITARIO']);
            $table->enum('tipo', ['PERSONA FISICA', 'PERSONA JURIDICA']);
            $table->enum('forma_pago', ['TRANSFERENCIA', 'PAY PAL', 'CONTADO'])->nullable();
            $table->enum('dias_pago', ['0', '15', '30', '60'])->nullable();
            $table->string('moneda')->nullable();
            $table->text('observaciones')->nullable();
            
            //fecha de creacion
            $table->timestamps();
            
            //trabaja con eliminación en vistas, no en tabla
            $table->softDeletes();
            
            // Remove the primary key
            // $table->dropPrimary("id");
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
        Schema::dropIfExists('clientes');
    }
}
