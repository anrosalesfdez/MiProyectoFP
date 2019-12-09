<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //se añaden datos para contactar y conocer al usuario que compra la aplicación
            //nombre = name, ya está en la migración de create por laravel
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('telefono')->nullable();
            //email, ya está en la migración de create por laravel
            $table->date('fecha_nacimiento')->nullable();
            $table->string('nif')->nullable()->unique();
            $table->string('direccion')->nullable();
            $table->string('cp')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais')->nullable();

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
        Schema::dropIfExists('users');
    }
}
