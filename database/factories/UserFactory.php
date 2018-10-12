 <?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    $a = array('SM','CO' );
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'type' => $a[array_rand($a)],
    ];
});

$factory->define(App\Alumni::class, function (Faker $faker) {

    return [
        'email' => $faker->safeEmail,
        'name' =>$faker->name,
        'address' =>$faker->address,
        'city' =>$faker->city,
        'country' =>$faker->country,
        'mobile' =>$faker->e164PhoneNumber,
        'dob' =>$faker->date,
        'company' =>$faker->company,
        'yog'=>$faker->year,
        'hall' =>$faker->e164PhoneNumber,
        'dept' =>$faker->date,
        'designation' =>$faker->company,
        'notes'=>" ",

    ];
});


$factory->define(App\smember::class, function (Faker $faker) {

    return [
        'email' => $faker->safeEmail,
        'name' =>$faker->name,
        'url' =>$faker->text,


    ];
});
