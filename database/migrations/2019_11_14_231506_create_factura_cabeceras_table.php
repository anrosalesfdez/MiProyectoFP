<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaCabecerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_cabeceras', function (Blueprint $table) {
            //identificadores
            $table->increments('id');
            $table->bigInteger('users_id')->unsigned();
            $table->integer('emisores_id')->unsigned();
            $table->integer('clientes_id')->unsigned();
            $table->integer('ejercicio');
            $table->string('serie');
            $table->integer('numero');
            //datos calculados
            $table->date('fecha');
            $table->date('vencimiento');
            $table->decimal('gransubtotal');
            $table->decimal('base21');
            $table->decimal('base10');
            $table->decimal('base04');
            $table->decimal('base00');
            $table->decimal('total');
            $table->text('observaciones')->nullable();
            //aportados por el emisor (de inicio se obliga a campos fiscales)
            $table->string('emi_nif')->nullable();
            $table->string('emi_niva')->nullable();
            $table->string('emi_nombre_fiscal');
            $table->string('emi_nombre_comercial')->nullable();
            $table->string('emi_telefono')->nullable();
            $table->string('emi_direccion_fiscal');
            $table->string('emi_direccion_comercial')->nullable();
            $table->string('emi_cp_fiscal');
            $table->string('emi_cp_comercial')->nullable();
            $table->string('emi_provincia_fiscal');
            $table->string('emi_provincia_comercial')->nullable();
            $table->string('emi_pais_fiscal');
            $table->string('emi_pais_comercial')->nullable();
            //aportados por el cliente
            $table->string('cli_razon_social');
            $table->string('cli_nif')->nullable();
            $table->string('cli_niva')->nullable();
            $table->string('cli_direccion')->nullable();
            $table->string('cli_provincia')->nullable();
            $table->string('cli_pais');
            $table->string('cli_cp')->nullable();
            $table->string('cli_telefono')->nullable();
            $table->string('cli_email')->nullable();
            $table->string('cli_ambito');
            $table->string('cli_tipo');
            $table->string('cli_forma_pago')->nullable();
            $table->string('cli_dias_pago')->nullable();
            $table->string('cli_moneda')->nullable();
            //estados de la factura
            $table->boolean('anulada')->default(false);
            $table->boolean('pagada')->default(false);
            $table->boolean('presentada')->default(false);

            
            $table->timestamps();

            //trabaja con eliminación en vistas, no en tabla
            $table->softDeletes();

            //PK
            // $table->primary(['emisores_id', 'ejercicio', 'serie', 'numero']);

            //foreign key
            $table->foreign('users_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('clientes_id')
                  ->references('id')
                  ->on('clientes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('emisores_id')
                  ->references('id')
                  ->on('emisores')
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
        Schema::dropIfExists('factura_cabeceras');
    }
}
