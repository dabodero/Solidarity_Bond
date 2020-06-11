<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Utilisateur;
use Faker\Generator as Faker;

$factory->define(Utilisateur::class, function (Faker $faker) {
    return [
        'ID_Role' => $faker->numberBetween(1,3),
        'Nom' => $faker->name,
        'Prenom' => $faker->name,
        'Mail' => $faker->unique()->email,
        'MotDePasse' => $faker->password,
        'Entreprise' => $faker->company,
        'Telephone' => $faker->text(10),
        'SIRET' => $faker->unique()->text(20)
    ];
});
