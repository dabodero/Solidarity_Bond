<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    static $autoIncrement = 0;

    $roles = ['Client', 'Admin', 'Fablab'];

    return [
        'Role'=> $roles[$autoIncrement++]
    ];
});



