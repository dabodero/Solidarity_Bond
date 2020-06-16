<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Composer;
use Faker\Generator as Faker;

$autoIncrementCommande = autoIncrement();

$factory->define(Composer::class, function (Faker $faker) use ($autoIncrementCommande) {

    $autoIncrementCommande->next();

    return [
        'ID_Commande' => $autoIncrementCommande->current(),
    ];
});
