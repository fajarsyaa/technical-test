<?php

namespace Database\Factories;

use App\Models\Mine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "position" => "pegawai",
            "identity_number" => $this->faker->randomNumber(9),
            "is_ready" => true
        ];
    }
}
