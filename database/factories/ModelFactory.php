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
        'username'       => $faker->userName,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});


$factory->define(App\Alamat::class, function (Faker\Generator $faker) {
    return [
        'negara'        => 'id',
        'provinsi'      => '35',
        'kota'          => '3507',
        'kecamatan'     => '3507020',
        'alamat'        => $faker->address,
        'nama_alamat'   => $faker->words(2, true),
        'nama_penerima' => $faker->name,
        'no_telp'       => $faker->phoneNumber,
        'kode_pos'      => $faker->postcode,
        'keterangan'    => $faker->paragraph
    ];
});

$factory->define(App\Biodata::class, function (Faker\Generator $faker) {
    return [
        'nama'      => $faker->name,
        'no_telp'   => $faker->phoneNumber,
        'birthdate' => $faker->date('Y-m-d', 'now'),
        'gender'    => $faker->randomElement(['l', 'p']),
        'bio'       => $faker->paragraph,
        'avatar'    => 'https://avatars1.githubusercontent.com/u/' . $faker->numberBetween(1, 52233) . '?v=3&s=80',
    ];
});

$factory->define(App\Permission::class, function () {
    return [];
});

$factory->define(App\Role::class, function () {
    return [];
});

$factory->define(App\Menu::class, function () {
    return [];
});

$factory->define(App\Setting::class, function () {
    return [];
});
