<?php

namespace Database\Factories;

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
        $fakeLogo = $this->faker->image(
            storage_path('app/public'),
            200,
            200
        );

        return [
            'name'=>fake()->company,
            'email'=>fake()->companyEmail,
            'logo'=>storage_path('app/public/') . basename($fakeLogo),
            'website'=>fake()->url
        ];
    }
}
