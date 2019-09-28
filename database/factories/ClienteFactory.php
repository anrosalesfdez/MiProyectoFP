<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Cliente;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'razon_social' => $faker->name,
        'nif'
        'niva'
        'direccion'
        'prov' => $faker->sentence,
        'pais' => $faker->sentence,
        'cp' => $faker->sentence,
        'tlfn' => $faker->cellphone
        'email' => $faker->email,
        'ambito_cl' => $faker->sentence,
        'tipo_cl' => $faker->sentence,
        'forma_pago' => $faker->sentence,
        'dias_pago' => $faker->sentence,
        'observ' => $faker->sentence
    ];
});
