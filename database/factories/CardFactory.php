<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\Column;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Card>
 */
class CardFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => $this->faker->realText(100),
            'column_id' => Column::factory()->create(),
        ];
    }
}
