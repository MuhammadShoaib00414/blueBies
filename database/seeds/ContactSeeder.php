<?php

use Illuminate\Database\Seeder;
use App\Contact;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'address' => '123 Main St',
            'phoneNumber' => '555-555-5555',
            'email' => 'example@example.com',
        ]);
    }
}
