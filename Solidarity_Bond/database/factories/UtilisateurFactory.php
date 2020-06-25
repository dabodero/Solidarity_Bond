<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Utilisateur;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Utilisateur::class, function (Faker $faker) {
    return [
        'ID_Role' => $faker->numberBetween(1,3),
        'Nom' => $faker->firstName,
        'Prenom' => $faker->lastName,
        'Mail' => $faker->unique()->email,
        'MotDePasse' => $faker->password,
        'Entreprise' => $faker->company,
        'Telephone' => $faker->regexify("0[0-9]{9}"),
    ];
});

$factory->state(Utilisateur::class, 'Client', function(){
    return ['ID_Role'=>1];
});

$factory->state(Utilisateur::class, 'Admin', function(){
    return ['ID_Role'=>2];
});

$factory->state(Utilisateur::class, 'Fablab', function(){
    return ['ID_Role'=>3];
});
