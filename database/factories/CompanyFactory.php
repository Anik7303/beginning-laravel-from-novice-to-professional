<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = $this->faker;
        return [
            'name' => $faker->company(),
            'website' => $faker->domainName(),
            'email' => $faker->email(),
            'address' => $faker->address(),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}