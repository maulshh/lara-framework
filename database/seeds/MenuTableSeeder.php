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
                'uri'           => 'admin',
                'title'         => 'Go to Dashboard',
                'body'          => 'Dashboard'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '5.1',
                'icon'          => 'group',
                'name'          => 'user',
                'uri'           => 'admin/user',
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
                'name'          => 'setting',
                'icon'          => 'gear',
                'uri'           => '',
                'title'         => 'Pengaturan Website',
                'body'          => 'Pengaturan',
                'type'          => 'parent'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '9.2',
                'name'          => 'menu',
                'icon'          => 'bars',
                'uri'           => 'admin/menu',
                'title'         => 'Pengaturan Menu',
                'body'          => 'Menus'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '9.3',
                'icon'          => 'key',
                'name'          => 'permission',
                'uri'           => 'admin/permission',
                'title'         => 'Roles & Permissions',
                'body'          => 'Permissions'
            ],
            [
                'module_target' => 'sidebar-admin',
                'position'      => '9.1-1',
                'name'          => 'setting',
                'icon'          => '',
                'uri'           => 'admin/setting/global/update',
                'title'         => 'Pengaturan Global',
                'body'          => 'Global'
            ]
        ];

        for ($i = 0; $i < count($menus); $i++) {
            $menus[$i] = factory(\App\Menu::class)->create($menus[$i]);
        }

        $menus[0]->roles()->attach(3);
        $menus[1]->roles()->attach(3);
        $menus[2]->roles()->attach(2);
        $menus[3]->roles()->attach(2);
        $menus[4]->roles()->attach(2);
        $menus[5]->roles()->attach(1);
        $menus[6]->roles()->attach(1);
        $menus[7]->roles()->attach(1);
    }
}
