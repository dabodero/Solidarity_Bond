<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Role;
use Faker\Generator as Faker;

$autoIncrement = autoIncrement();

$factory->define(Role::class, function (Faker $faker) use ($autoIncrement) {
    $current = $autoIncrement->current();
    $roles = ['Client', 'Admin', 'Fablab'];

    $autoIncrement->next();
    return [
        'Role'=> $roles[$current]
    ];
});



