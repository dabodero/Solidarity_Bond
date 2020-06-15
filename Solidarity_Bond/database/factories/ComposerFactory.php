<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Composer;
use Faker\Generator as Faker;

$factory->define(Composer::class, function (Faker $faker) {
    return [
        'ID_Produit' => $faker->numberBetween(1,3),
        'ID_Commande' => $faker->unique()->numberBetween(1,10),
        'Quantite' => $faker->numberBetween(1,20)
    ];
});
