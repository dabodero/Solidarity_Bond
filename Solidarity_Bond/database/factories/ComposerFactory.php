<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Composer;
use Faker\Generator as Faker;

$factory->define(Composer::class, function (Faker $faker) {
    static $autoIncrement = 1;

    return [
        'ID_Commande' => $autoIncrement++,
    ];
});
