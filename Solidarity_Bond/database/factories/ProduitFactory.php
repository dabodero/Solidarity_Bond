<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Produit;
use Faker\Generator as Faker;

$autoIncrement = autoIncrement();

$factory->define(Produit::class, function (Faker $faker) use ($autoIncrement) {
    $current = $autoIncrement->current();
    $produits = ['Vitre de protection', 'Attache', 'Support'];

    $autoIncrement->next();
    return [
        'Nom' => $produits[$current],
        'Description' => $faker->text(200)
    ];
});
