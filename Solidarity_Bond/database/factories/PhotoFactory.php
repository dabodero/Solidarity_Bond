<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'ID_Produit' => $faker->numberBetween(1,3),
        'Nom' => $faker->streetName,
        'CheminAcces' => $faker->url,
        'Description' => $faker->text(100)
    ];
});
