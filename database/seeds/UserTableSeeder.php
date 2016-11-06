<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $maul = factory(\App\Users\User::class)->create(
            ['username' => 'webmaster', 'email' => 'webmaster@laraframe.com']
        );
        $maul->biodata()->save(factory(\App\Users\Biodata::class)->make());
        $maul->addAlamat(factory(\App\Users\Alamat::class)->make());
        $maul->roles()->attach(1);
        $maul->roles()->attach(2);
        $maul->roles()->attach(3);



        $admin = factory(\App\Users\User::class)->create(
            ['username' => 'admin', 'email' => 'admin@laraframe.com']
        );
        $admin->biodata()->save(factory(\App\Users\Biodata::class)->make());
        $admin->addAlamat(factory(\App\Users\Alamat::class)->make());
        $admin->roles()->attach(2);
        $admin->roles()->attach(3);
        
        factory(\App\Users\User::class, 5)->create()->each(function ($u) {
            $u->biodata()->save(factory(\App\Users\Biodata::class)->make());
            $u->addAlamat(factory(\App\Users\Alamat::class)->make());
            $u->roles()->attach(3);
        });
    }
}
