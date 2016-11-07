<?php

$factory->define(App\Users\Alamat::class, function (Faker\Generator $faker) {
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

$factory->define(App\Users\Biodata::class, function (Faker\Generator $faker) {
    return [
        'nama'          => $faker->name,
        'no_telp'       => $faker->phoneNumber,
        'birthday'      => $faker->date('Y-m-d', 'now'),
        'jenis_kelamin' => $faker->randomElement(['l', 'p']),
        'bio'           => $faker->paragraph,
        'avatar'        => 'https://avatars1.githubusercontent.com/u/' . $faker->numberBetween(1, 52233) . '?v=3&s=80',
    ];
});

$factory->define(\App\Users\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'email'    => $faker->safeEmail,
        'password' => bcrypt('password'),
    ];
});

$factory->define(App\Users\Permission::class, function () {
    return [];
});

$factory->define(App\Users\Role::class, function () {
    return [];
});

$factory->define(App\Menu::class, function () {
    return [];
});

$factory->define(App\Setting::class, function () {
    return [];
});