<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Utilisateur;
use Faker\Generator as Faker;

$factory->define(Utilisateur::class, function (Faker $faker) {
    return [
        'ID_Role' => $faker->numberBetween(1,3),
        'Nom' => $faker->firstName,
        'Prenom' => $faker->lastName,
        'Mail' => $faker->unique()->email,
        'MotDePasse' => $faker->password,
        'Entreprise' => $faker->company,
        'Telephone' => $faker->regexify("0[0-9]{9}"),
        'SIRET' => $faker->unique()->text(20)
    ];
});
