<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Contact;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'title' => $faker->company(),
        'description' => $faker->paragraph(3),
        'logo' => $faker->imageUrl(300, 300, 'cats'),
        'contact_id' => factory(Contact::class)->create()->id

    ];
});
