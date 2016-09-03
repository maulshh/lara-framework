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
                'position'      => '0',
                'body'          => 'Main Navigation',
                'type'          => 'separator'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '1',
                'icon'          => 'home',
                'name'          => 'dashboard',
                'uri'           => '/home',
                'title'         => 'Go to Dashboard',
                'body'          => 'Dashboard'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '2',
                'icon'          => 'user',
                'name'          => 'hero',
                'uri'           => '/hero',
                'title'         => 'Go to Hero App',
                'body'          => 'Hero App'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '3',
                'icon'          => 'group',
                'name'          => 'user',
                'uri'           => '/user',
                'title'         => 'User Management',
                'body'          => 'Users'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '9',
                'body'          => 'Settings',
                'type'          => 'separator'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '9.1',
                'icon'          => 'gear',
                'uri'           => 'setting/update/global',
                'name'          => 'setting',
                'title'         => 'Pengaturan Website',
                'body'          => 'Settings'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '9.2',
                'icon'          => 'bars',
                'uri'           => 'menu',
                'name'          => 'menu',
                'title'         => 'Pengaturan Menu',
                'body'          => 'Menus'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '9.3',
                'icon'          => 'key',
                'uri'           => 'permission',
                'name'          => 'permission',
                'title'         => 'Roles & Permissions',
                'body'          => 'Permissions'
            ]
        ];

        for ($i = 0; $i < count($menus); $i++) {
            $menus[$i] = factory(\App\Menu::class)->create($menus[$i]);
        }

        $menus[0]->roles()->save(App\Users\Role::find(3));
        $menus[1]->roles()->save(App\Users\Role::find(3));
        $menus[2]->roles()->save(App\Users\Role::find(3));
        $menus[3]->roles()->save(App\Users\Role::find(2));
        $menus[4]->roles()->save(App\Users\Role::find(2));
        $menus[5]->roles()->save(App\Users\Role::find(2));
        $menus[6]->roles()->save(App\Users\Role::find(1));
        $menus[7]->roles()->save(App\Users\Role::find(1));
    }
}
