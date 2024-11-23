<?php

namespace Database\Factories;

use App\Domain\Countries\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Country>
 */
class CountryFactory extends Factory
{
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country,
            'code' => $this->faker->countryCode,
            'flag' => $this->faker->imageUrl(),
        ];
    }
}
