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
        'facility' => $faker->randomElement(['Panama City', 'Orlando', 'Tallahassee'])
    ];
});

$factory->define(App\Resident::class, function (Faker\Generator $faker) {

    return [
        'facility' => $faker->randomElement(['Panama City', 'Tallahassee', 'Orlando']),
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'middle_initial' => $faker->randomLetter,
        'sex' => $faker->randomElement($array = array('M','F')),
        'race' => $faker->randomElement($array = array('White','Native Hawaiian or Other Pacific Islander', 'Black or African American', 'Asian', 'American Indian or Alaskan Native', 'Hispanic or Latino')),
        'document_number' => $faker->bothify('##########'),
        'service_center_number' => $faker->bothify('########'),
        'dob' => $faker->date(),
        'age' => $faker->randomNumber(2),
        'drug' => $faker->randomElement($array = array('Cocaine', 'Alcohol', 'Cannabis', 'Amphetamines', 'Barbiturates', 'Poly Substance', 'Opiates', 'Morphine', 'LSD')),
        'date_of_admission' => $faker->date(),
        'projected_date_of_discharge' => $faker->date(),
        'actual_date_of_discharge' => $faker->date(),
        'status' => $faker->randomElement($array = array('DOP', 'Prob', 'PDO', 'CC', 'County', 'Federal')),
        'status_at_discharge' => $faker->randomElement($array = array('Successful', 'Unsuccessful', 'Abscond', 'Administrative', 'Drug Use', 'Non-Payment', 'Absenteeism', 'ReArrest')),
        'treatment_level_placement' => $faker->randomElement($array = array('Residential II', 'OP Level I', 'OP Level II', 'OP Level III', 'OP Level IV', 'OP Day/Night')),
        'counselor' => $faker->lastName,
        'program_level' => $faker->randomElement($array = array('I', 'II')),
        'employment_date' => $faker->date(),
        'payment_method' => $faker->randomElement($array = array('Nonsecure', 'DOC Funded', 'DOC Self Pay', 'WCFDI Self Pay', 'DOC Co-Pay', 'County Self Pay', 'Federal Self Pay')),
        'referral_source' => $faker->randomElement($array = array('DOC', 'WCFDI', 'County', 'Federal'))
    ];
});
$factory->define(App\Transaction::class, function (Faker\Generator $faker) {

    return [
//        'resident_id' => factory('App\Resident')->create()->id,
        'date' => $faker->date('Y-m-d'),
        'reason' => $faker->randomElement($array = array('Urinalysis', 'Rides', 'Anger Management', 'Physical', 'Payment', 'Sustenance')),
        'debit' => $faker->numberBetween(0, 10000),
        'credit' => $faker->numberBetween(0, 10000),
        'facility' => $faker->randomElement(['Panama City', 'Orlando', 'Tallahassee'])
    ];
});

$factory->define(App\Note::class, function (Faker\Generator $faker) {

    return [
//        'resident_id' => factory('App\Resident')->create()->id,
        'date' => $faker->date('Y-m-d'),
        'note' => $faker->words(15, true),
        'updated_by' => 1
    ];
});
