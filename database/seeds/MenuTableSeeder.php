<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $menus = [
            [
                'module_target' => 'sidebar-admin',
                'position'      => '1-0',
                'icon'          => 'home',
                'uri'           => '/dashboard',
                'title'         => 'Go to Dashboard',
                'body'          => 'Dashboard',
                'type'          => ''
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '2-0',
                'icon'          => 'post',
                'uri'           => '/post/all',
                'title'         => 'Manage Posts',
                'body'          => 'Posts',
                'type'          => ''
            ]
        ];

        foreach ($menus as $menu) {
            factory(\App\Menu::class)->create($menu)->each(function ($m) {
//                $m->roles()->save(App\Users\Role::find(1));
//                $m->roles()->save(App\Users\Role::find(2));
            });
        }
    }
}
