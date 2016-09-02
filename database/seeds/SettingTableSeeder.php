<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $settings = [
            [
                'module' => 'global',
                'name'   => 'app_title',
                'label'  => 'Nama Aplikasi',
                'type'   => 'string',
                'string' => 'LaraFrame'
            ],
            [
                'module' => 'global',
                'name'   => 'app_motto',
                'label'  => 'Motto Aplikasi',
                'type'   => 'string',
                'string' => 'Best App Framework'
            ]
        ];

        foreach ($settings as $setting) {
            factory(\App\Setting::class)->create($setting);
        }
    }
}
