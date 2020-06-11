<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Commentaire;
use Faker\Generator as Faker;

$factory->define(Commentaire::class, function (Faker $faker) {
    return [
        'ID_Utilisateur' => $faker->numberBetween(1,10),
        'ID_Produit' => $faker->numberBetween(1,3),
        'Commentaire' => $faker->text(100),
        'Date' => $faker->date()
    ];
});
