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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Resident::class, function (Faker\Generator $faker) {

    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'middle_initial' => $faker->randomLetter,
        'sex' => $faker->randomElement($array = array ('M','F')),
        'race' => $faker->randomElement($array = array ('Caucasian','African-American', 'Hispanic')),
        'document_number' => $faker->bothify('##########'),
        'service_center_number' => $faker->bothify('########'),
        'dob' => $faker->date(),
        'age' => $faker->randomNumber(2),
        'drug' => $faker->word,
        'date_of_admission' => $faker->date(),
        'projected_date_of_discharge' => $faker->date(),
        'actual_date_of_discharge' => $faker->date(),
        'status' => $faker->word,
        'status_at_discharge' => $faker->word,
        'treatment_level_placement' => $faker->word,
        'counselor' => $faker->lastName,
        'program_level' => $faker->randomDigitNotNull,
        'employment_date' => $faker->date(),
        'payment_method' => $faker->word,
        'referral_source' => $faker->company
    ];
});
