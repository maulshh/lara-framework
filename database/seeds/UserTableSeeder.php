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
            ['username' => 'maulshh', 'email' => 'maulshh@gmail.com', 'password' => bcrypt('Singosari123')]
        );
        $maul->biodata()->save(factory(\App\Users\Biodata::class)->make());
        $maul->alamats()->save(factory(\App\Users\Alamat::class)->make());
        $maul->roles()->save(App\Users\Role::first());

        factory(\App\Users\User::class, 5)->create()->each(function ($u) {
            $u->biodata()->save(factory(\App\Users\Biodata::class)->make());
            $u->alamats()->save(factory(\App\Users\Alamat::class)->make());
            $u->roles()->save(App\Users\Role::find(2));
//            $c = $u->catering()->save(factory(App\Catering::class)->make());
//            for ($i = 0; $i < 10; $i++)
//                $c->makanans()->save(factory(App\Makanan::class)->make());
        });

        factory(\App\Users\User::class, 5)->create()->each(function ($u) {
            $u->biodata()->save(factory(\App\Users\Biodata::class)->make());
            $u->alamats()->save(factory(\App\Users\Alamat::class)->make());
        });
    }
}
