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
                'module'      => 'global',
                'name'        => 'app_title',
                'placeholder' => 'e.g. LaraFrame',
                'label'       => 'Nama Aplikasi',
                'type'        => 'string',
                'string'      => 'LaraFrame'
            ],
            [
                'module'      => 'global',
                'name'        => 'app_motto',
                'placeholder' => 'e.g. Best App Framework',
                'label'       => 'Motto Aplikasi',
                'type'        => 'string',
                'string'      => 'Best App Framework'
            ],
            [
                'module'      => 'template',
                'name'        => 'tmp_skin',
                'placeholder' => 'blue / red / green / black / purple / yellow',
                'label'       => 'Skin Color',
                'type'        => 'string',
                'string'      => 'blue'
            ],
            [
                'module'      => 'template',
                'name'        => 'tmp_color',
                'placeholder' => 'primary / danger / info / default',
                'label'       => 'Modal Colors',
                'type'        => 'string',
                'string'      => 'primary'
            ],
            [
                'module'      => 'json',
                'name'        => 'banners',
                'placeholder' => '[]',
                'label'       => 'Banners JSON',
                'type'        => 'text',
                'text'      => "[
                    {
                        label: 'Carousel Home',
                        name: 'carousel',
                        width: 1500,
                        height: 500,
                        variants: [1, 2, 3, 4, 5, 6],
                        location: 'images/banner/home/'
                    },
                    {
                        label: 'Mini Banner Home',
                        name: 'mini',
                        width: 470,
                        height: 250,
                        variants: [1, 2, 3],
                        location: 'images/banner/'
                    }
                ]"
            ]
        ];

        foreach ($settings as $setting) {
            factory(\App\Setting::class)->create($setting);
        }
    }
}
