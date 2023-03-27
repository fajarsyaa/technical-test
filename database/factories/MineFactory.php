<?php

namespace Database\Factories;

use App\Models\Mine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mine>
 */
class MineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Mine::class;
    public function definition(): array
    {
        return [
            "branch_office_id" => 1,
            "name" => "Tambang " . $this->faker->firstName,
            "address" => $this->faker->streetAddress . " Malang, Jawa Timur",
            "description" => "Tambang nikel",
        ];
    }
}
