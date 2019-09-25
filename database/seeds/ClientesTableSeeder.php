<?php

use Illuminate\Database\Seeder;
use\App\Cliente;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usamos método factory para crear registros.
        factory(Cliente::class, 50)->create();
    }
}
