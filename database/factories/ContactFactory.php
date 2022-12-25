<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'email' => $this->faker->email(),
            'company_id' => Company::pluck('id')->random(),
            'user_id' => Company::find(Company::pluck('id')->random())->user_id,
        ];
    }
}

/**
// using Contact factory
Contact::factory()->create();
Contact::factory()->count(3)->create();
Contact::factory()->make(); // generate in memory instead of creating a record in database
*/