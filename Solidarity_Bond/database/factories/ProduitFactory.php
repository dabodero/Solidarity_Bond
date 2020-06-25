<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Produit;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker) {
    static $autoIncrement = 0;
    $produits = ['Vitre de protection', 'Attache', 'Support'];

    return [
        'Nom' => $produits[$autoIncrement++],
        'Description' => $faker->text(200)
    ];
});

$factory->state(Produit::class, "Vitre", function(){
    return ['Nom'=>'Vitre de protection'];
});

