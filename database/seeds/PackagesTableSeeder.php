<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'Silver package',
                'price' => 5000,
                'localization' => 'باقة فضية'
            ],
            [
                'name' => 'Golden package',
                'price' => 5000,
                'localization' => 'باقة ذهبية'
            ],
            [
                'name' => 'Platinum package',
                'price' => 4800,
                'localization' => 'باقة بلاتينية'
            ],
            [
                'name' => 'Diamond package',
                'price' => 7500,
                'localization' => 'باقة الماس'
            ],
            // Add more packages as needed
        ];

        DB::table('packages')->insert($packages);
    }
}
