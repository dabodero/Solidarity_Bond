<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Commande;
use Faker\Generator as Faker;

$factory->define(Commande::class, function (Faker $faker) {
    return [
        'ID_Utilisateur' => $faker->numberBetween(1,10),
        'Terminee' => $faker->boolean(50)
    ];
});
