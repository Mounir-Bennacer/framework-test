<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Companies;
use Faker\Generator as Faker;

$factory->define(Companies::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->email,
        /* 'logo' => $faker->image('/storage/app/public/logos',100,100,null,false), */
        'logo' => $faker->imageUrl(100,100,'cats',true),
        'website' => $faker->url
    ];
});
