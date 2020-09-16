<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employees;
use Faker\Generator as Faker;

$factory->define(Employees::class, function (Faker $faker) {
    // first we fetch all the companies's id from the db
    // then we inject a random number of thoses ids into faker
    $companies = App\Companies::pluck('id')->toArray();
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'companies_id' => $faker->randomElement($companies)
    ];
});
