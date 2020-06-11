<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Produit;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker) {
    return [
        'Nom' => $faker->name,
        'Description' => $faker->text(200)
    ];
});
