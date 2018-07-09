<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "lastname" => $faker->name,
        "email" => $faker->safeEmail,
        "password" => str_random(10),
        "brithdate" => $faker->date("Y-m-d", $max = 'now'),
        "address" => $faker->name,
        "phone" => $faker->randomNumber(2),
        "remember_token" => $faker->name,
        "role_id" => factory('App\Role')->create(),
    ];
});
