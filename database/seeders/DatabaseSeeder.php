<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Company;
use App\Models\Contact;
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
        User::factory()->count(6)->create()->each(function ($user) {
            Company::factory()->count(rand(5, 15))->create(['user_id' => $user->id])->each(
                function ($company) use ($user) {
                    Contact::factory()->count(rand(5, 10))->create(['company_id' => $company->id, 'user_id' => $user->id]);
                }
            );
        });
    }
}