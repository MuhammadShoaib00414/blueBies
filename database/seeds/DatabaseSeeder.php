<?php

use Database\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'failed_jobs',
            'ledgers',
            'jobs',
            'sessions',
        ]);

        $this->call(AuthTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(EmailTemplateSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(BlogCategoryTableSeeder::class);
        $this->call(PackagesTableSeeder::class);

        $this->call(FeaturesTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
       
        $this->call(PackageFeaturesTableSeeder::class);
       


        Model::reguard();
    }
}
