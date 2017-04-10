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
$factory->define(App\Core\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('12345678'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Core\Models\VehicleType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement([
            'Xe 24 Cho',
            'Xe 16 Cho',
        ]),
        'description' => $faker->sentence(30)
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Core\Models\Station::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->country
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Core\Models\ServiceProvider::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->sentence(30),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Core\Models\TicketAgent::class, function (Faker\Generator $faker) {
    $serviceProvider = \App\Core\Models\ServiceProvider::all()->pluck('id')->toArray();
    return [
        'name' => $faker->country,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'service_provider_id' => $faker->randomElement($serviceProvider),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Core\Models\Vehicle::class, function (Faker\Generator $faker) {
    $vehicleType = \App\Core\Models\VehicleType::all()->pluck('id')->toArray();
    $serviceProvider = \App\Core\Models\ServiceProvider::all()->pluck('id')->toArray();
    return [
        'imei' => $faker->unique()->numberBetween(100000000, 999999999),
        'license_plate' => $faker->unique()->numberBetween(1111, 9999),
        'driver_name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'vehicle_type_id' => $faker->randomElement($vehicleType),
        'service_provider_id' => $faker->randomElement($serviceProvider)
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Core\Models\VehicleSchedule::class, function (Faker\Generator $faker) {
    $stations = \App\Core\Models\Station::all()->pluck('id')->toArray();
    $vehicles = \App\Core\Models\Vehicle::all()->pluck('id')->toArray();
    return [
        'start_station_id' => $faker->randomElement($stations),
        'end_station_id' => $faker->randomElement($stations),
        'vehicle_id' => $faker->randomElement($vehicles),
        'time_start' => $faker->dateTime,
        'time_end' => $faker->dateTime,
        'price' => $faker->randomDigit,
    ];
});
