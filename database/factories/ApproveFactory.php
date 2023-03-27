<?php

namespace Database\Factories;

use App\Models\Approve;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Approve>
 */
class ApproveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Approve::class;

    public function definition(): array
    {
        return [
            "approver_name" => "aaaa",
            "date_approve" => date('Y-m-d'),
        ];
    }
}
