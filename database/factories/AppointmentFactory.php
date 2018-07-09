<?php

$factory->define(App\Appointment::class, function (Faker\Generator $faker) {
    return [
        "patient_id" => factory('App\User')->create(),
        "doctor_id" => factory('App\User')->create(),
        "appointment" => $faker->date("Y-m-d H:i:s", $max = 'now'),
    ];
});
