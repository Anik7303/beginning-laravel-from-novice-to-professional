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
        $faker = $this->faker;
        $company_id = Company::pluck('id')->random();
        return [
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'email' => $faker->email(),
            'address' => $faker->address(),
            'phone' => $faker->phoneNumber(),
            'company_id' => $company_id,
            'user_id' => Company::find($company_id)->user->id,
        ];
    }
}