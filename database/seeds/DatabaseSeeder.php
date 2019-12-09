<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Angeles',
            'email' => 'anrosales86@gmail.com',
            'password' => bcrypt('Alfa123*')
        ]);

        DB::table('impuesto_liquidables')->insert([
            'codigo' => 'GE',
            'valor' => '21',
            'descripcion' => 'general'
        ]);
        DB::table('impuesto_liquidables')->insert([
            'codigo' => 'RE',
            'valor' => '10',
            'descripcion' => 'reducido'
        ]);
        DB::table('impuesto_liquidables')->insert([
            'codigo' => 'SU',
            'valor' => '04',
            'descripcion' => 'superreducido'
        ]);
        DB::table('impuesto_liquidables')->insert([
            'codigo' => 'EX',
            'valor' => '00',
            'descripcion' => 'exento'
        ]);
        DB::table('impuesto_liquidables')->insert([
            'codigo' => 'NO',
            'valor' => '00',
            'descripcion' => 'no sujeto'
        ]);

        DB::table('actividades')->insert([
            'codigo' => '7430',
            'titulo' => 'Actividades de traducción e interpretación',
            'impuesto_liquidables_id' => '1'
        ]);
        DB::table('actividades')->insert([
            'codigo' => '6201',
            'titulo' => 'Actividades de programación informática',
            'impuesto_liquidables_id' => '1'
        ]);
        DB::table('actividades')->insert([
            'codigo' => '6202',
            'titulo' => 'Actividades de consultoría informática',
            'impuesto_liquidables_id' => '1'
        ]);
        DB::table('actividades')->insert([
            'codigo' => '9001',
            'titulo' => 'Artes escénicas',
            'descripcion' => 'conciertos en vivo',
            'impuesto_liquidables_id' => '2'
        ]);
    }
}
