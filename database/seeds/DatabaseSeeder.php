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
        //DATOS DEMO
        DB::table('users')->insert([
            'name' => 'Angeles',
            'email' => 'anrosales86@gmail.com',
            'password' => bcrypt('Alfa123*')
        ]);

        DB::table('emisores')->insert([
            'nombre_fiscal' => 'Angeles',
            'email' => 'anrosales86@gmail.com',
            'users_id' => auth()->user()->id
        ]);
        
        DB::table('actividades')->insert([
            'codigo' => '7430',
            'titulo' => 'Actividades de traducción e interpretación',
            'serie' => 'TRAD'
            'impuesto' => 'GE'
        ]);
        DB::table('actividades')->insert([
            'codigo' => '6201',
            'titulo' => 'Actividades de programación informática',
            'serie' => 'PROG'
            'impuesto' => 'GE'
        ]);
        DB::table('actividades')->insert([
            'codigo' => '6202',
            'titulo' => 'Actividades de consultoría informática',
            'serie' => 'CONS'
            'impuesto' => 'GE'
        ]);
        DB::table('actividades')->insert([
            'codigo' => '9001',
            'titulo' => 'Artes escénicas',
            'descripcion' => 'conciertos en vivo',
            'serie' => 'MUSI'
            'impuesto' => 'RE'
        ]);


        //DATOS ESTRUCUTRALES
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
        
        //ACTIVIDAD GENERAL
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'GE',
            'impto_linea' => 21,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'GE',
            'impto_linea' => 21,
            'retencion_linea' => 15, //PJURIDICAS SÍ RETENCIÓN
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'GE',
            'impto_linea' => 21,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'GE',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'GE',
            'impto_linea' => 21,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'GE',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'RE',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'RE',
            'impto_linea' => 10,
            'retencion_linea' => 15,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'RE',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'RE',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'RE',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'RE',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'SU',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'SU',
            'impto_linea' => 10,
            'retencion_linea' => 15,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'SU',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'SU',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'SU',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'SU',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'EX',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'EX',
            'impto_linea' => 10,
            'retencion_linea' => 15,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'EX',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'EX',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'EX',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'EX',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'NO',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'NACIONAL',
            'impto_act' => 'NO',
            'impto_linea' => 10,
            'retencion_linea' => 15,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'NO',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'INTRACOMUNITARIO',
            'impto_act' => 'NO',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA FISICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'NO',
            'impto_linea' => 10,
            'retencion_linea' => 0,
        ]);
        DB::table('impuesto_facturacions')->insert([
            'tipo_cl' => 'PERSONA JURIDICA',
            'ambito_cl' => 'EXTRACOMUNITARIO',
            'impto_act' => 'NO',
            'impto_linea' => 0,
            'retencion_linea' => 0,
        ]);

        
    }
}
