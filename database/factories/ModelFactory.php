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
$factory->define(App\Signature::class, function (Faker\Generator $faker) {

    return [
        'first_name' => $faker->firstName($gender = 'male'|'female'), 
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'message' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true)
    ];
});

