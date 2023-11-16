<?php

use Illuminate\Database\Seeder;
use App\Models\Partners;
class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partners::create([
            'user_id' => 1, // Replace with an existing user_id from your users table
            'title' => 'Beyond Bluebies',
            'heading' => 'Success Partners',
            'localization' => 'Sample Location',
            'images' => '["uploads/partners/company-1.png","uploads/partners/company-2.png","uploads/partners/company-3.png","uploads/partners/company-4.png","uploads/partners/order-logo-1","uploads/partners/order-logo-2","uploads/partners/company-3.png"]', // Replace with an image name or path
            'status' => 'active', // Set to 'active' or 'inactive'
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
