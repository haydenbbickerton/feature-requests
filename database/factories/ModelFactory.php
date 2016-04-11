<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'google_id' => $faker->uuid,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'display_name' => $faker->name,
        'email' => $faker->userName . '@britecore.com',
        'picture' => 'https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s150', // Default blank user image
    ];
});

$factory->define(App\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
    ];
});

$factory->define(App\Models\Feature::class, function (Faker\Generator $faker) {
    $dt = Carbon\Carbon::now();
    return [
        'title' => $faker->sentence(mt_rand(4, 15)),
        'description' => $faker->realText(mt_rand(25, 500)),
        'target_date' => $dt->addMonths(mt_rand(1, 24))->timestamp, // Sometime in next 2 years
        'url' => $faker->url,
        'areas' => $faker->randomElements(['Policies', 'Billing', 'Claims', 'Reports'], mt_rand(1, 2)), // Pick 1 or 2 from array
    ];
});
