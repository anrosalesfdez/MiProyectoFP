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
            $table->string('apellido1')->nullable()->change();
            $table->string('apellido2')->nullable()->change();
            $table->string('nif')->nullable()->change();
            $table->string('direccion')->nullable()->change();
            $table->string('cp')->nullable()->change();
            $table->string('ciudad')->nullable()->change();
            $table->string('pais')->nullable()->change();
            $table->dropColumn('nombrefiscal');
            $table->dropColumn('nombrecomercial');
            $table->dropColumn('direccionfiscal');

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
