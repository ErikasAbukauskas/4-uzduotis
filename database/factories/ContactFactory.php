<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'title' => $faker->name(),
        'phone' => $faker->e164PhoneNumber(),
        'address' => $faker->streetAddress(),
        'email' => $faker->unique()->safeEmail,
        'country' => $faker->country(),
        'city' => $faker->city()
    ];
});
