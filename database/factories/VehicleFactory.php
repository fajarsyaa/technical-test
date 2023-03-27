<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Vehicle::class;
    public function definition(): array
    {
        return [
            "vehicle_type" => collect(["transport", "ekspedisi"])->random(),
            "plat_number" => $this->faker->regexify('L [0-9]{3} [A-Z]{3}'),
            "merk" => collect(["mitsubisi", "panter", "honda", "yamaha", "komatsu"])->random(),
            "is_ready" => true,
            "is_service" => false,
            "service_routine" => collect([date('d'), date('d', strtotime(date('d') . ' + 3 days')), date('d', strtotime(date('d') . ' - 3 days'))])->random()
        ];
    }
}
