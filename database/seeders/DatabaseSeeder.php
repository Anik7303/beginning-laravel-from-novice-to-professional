<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();
        // using model factory
        // Company::factory()->count(10)->create();
        // Contact::factory()->count(50)->create();

        // using factory relationship
        // Company::factory()->has(
        //     Contact::factory()->count(rand(5, 15))
        // )->count(rand(5, 10))->create();

        // using magic method `has[relationship]`
        Company::factory()->hasContacts(rand(10, 15))->count(rand(5, 10))->create();
    }
}