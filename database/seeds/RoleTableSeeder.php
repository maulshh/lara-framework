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
            ['name' => 'edit-all-post', 'label' => 'Edit All Post'],
            ['name' => 'view-dashboard', 'label' => 'Access Dashboard'],
            ['name' => 'edit-post', 'label' => 'Edit Own Post']
        ];

        foreach ($permissions as $permission) {
            factory(\App\Users\Permission::class)->create($permission)->each(function ($p) {
//                $p->roles()->save(App\Users\Role::first());
            });
        }
    }
}
