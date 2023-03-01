<?php

namespace Database\Seeders;

use App\Models\Column;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($board): void
    {
        Column::factory(3)->create([
            'board_id' => $board,
        ]);
    }
}
