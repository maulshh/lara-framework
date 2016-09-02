<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $roles = [
            ['name' => 'admin', 'label' => 'Administrator'],
//            ['name' => 'mitra', 'label' => 'Mitra'],
            ['name' => 'user', 'label' => 'User']
        ];

        foreach ($roles as $role) {
            factory(\App\Users\Role::class)->create($role);
        }

        $permissions = [
            ['name' => 'access-menu', 'label' => 'Access All Menus'],
            ['name' => 'access-setting', 'label' => 'Access All Settings'],
            ['name' => 'access-permission', 'label' => 'Access All Permissions'],
            ['name' => 'access-role', 'label' => 'Access All Roles'],
            ['name' => 'view-dashboard', 'label' => 'Access Dashboard'],
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            $permissions[$i] = factory(\App\Users\Permission::class)->create($permissions[$i]);
            $permissions[$i]->roles()->save(App\Users\Role::find(1));
        }

        $permissions[3]->roles()->save(App\Users\Role::find(2));
    }
}
