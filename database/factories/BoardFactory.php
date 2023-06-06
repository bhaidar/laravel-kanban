<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Board>
 */
class BoardFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->company() . ' Board',
            'user_id' => User::factory()->create(),
        ];
    }
}
