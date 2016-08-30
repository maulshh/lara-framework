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

$factory->define(\App\Users\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Users\Alamat::class, function (Faker\Generator $faker) {
    return [
        'negara' => 'id',
        'provinsi' => $faker->citySuffix,
        'kota' => $faker->city,
        'kecamatan' => $faker->streetName,
        'alamat' => $faker->address,
        'nama_alamat' => $faker->words(2, true),
        'nama_penerima' => $faker->name,
        'no_telp' => $faker->phoneNumber,
        'kode_pos' => $faker->postcode
    ];
});

$factory->define(App\Users\Biodata::class, function (Faker\Generator $faker) {
    return [
        'nama' => $faker->name,
        'no_telp' => $faker->phoneNumber,
        'bday_dd' => $faker->dayOfMonth,
        'bday_mm' => $faker->month,
        'bday_yy' => $faker->year,
        'jenis_kelamin' => $faker->randomElement(['l', 'p']),
        'bio' => $faker->paragraph,
        'avatar' => '',
    ];
});

$factory->define(App\Catering::class, function (Faker\Generator $faker) {
    return [
        'nama' => $faker->words(2, true),
        'provinsi' => $faker->citySuffix,
        'kota' => $faker->city,
        'kecamatan' => $faker->streetName,
        'alamat' => $faker->address,
        'avatar_toko' => '',
        'bio_toko' => $faker->paragraph
    ];
});
$factory->define(App\Makanan::class, function (Faker\Generator $faker) {
    return [
        'nama' => $faker->words(2, true),
        'deskripsi' => $faker->paragraph,
        'pict' => '',
        'harga' => $faker->numberBetween(10000, 100000)
    ];
});

$factory->define(App\Menu::class, function(){
    return [];
});
$factory->define(App\Users\Role::class, function(){
    return [];
});
$factory->define(App\Users\Permission::class, function(){
    return [];
});
