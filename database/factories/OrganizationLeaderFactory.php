<?php

namespace Database\Factories;

use App\Models\OrganizationLeader;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrganizationLeader>
 */
class OrganizationLeaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'leader_name' => fake()->company(),
        ];
    }
}
