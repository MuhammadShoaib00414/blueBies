<?php

use Illuminate\Database\Seeder;
use App\Models\SupportRequest;
class SupportRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 dummy records
        for ($i = 1; $i <= 10; $i++) {
            SupportRequest::create([
                'user_id' => $i, // Use a different user ID for each record
                'address' => '123 Main St',
                'type' => 'Issue',
                'description' => 'This is a support request description for record ' . $i,
            ]);
        }
    }
}