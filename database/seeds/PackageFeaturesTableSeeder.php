<?php

use Illuminate\Database\Seeder;

class PackageFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('package_features')->insert([
            ['package_id' => 1, 'feature_id' => 1],
            ['package_id' => 1, 'feature_id' => 2],
            ['package_id' => 2, 'feature_id' => 2],
            // Add more assignments as needed
        ]);
    }
}
