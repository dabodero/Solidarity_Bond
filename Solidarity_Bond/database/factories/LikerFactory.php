<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Liker;
use Faker\Generator as Faker;

$factory->define(Liker::class, function (Faker $faker) {
    return [
        'ID_Utilisateur' => $faker->numberBetween(1,10),
        'ID_Commentaire' => $faker->unique()->numberBetween(1,20)
    ];
});
