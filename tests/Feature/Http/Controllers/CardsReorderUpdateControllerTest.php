<?php

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use App\Models\User;

use Inertia\Testing\Assert;

use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->user = User::factory()->create([
        'email' => 'bhaidar@gmail.com',
    ]);
    
    $this->board = Board::factory()->create();
    $this->columns = Column::factory()->for($this->board)->count(2)->create();
    
    $this->columns->each(function ($column) {
        $column->addCard(Card::factory()->create());
        $column->addCard(Card::factory()->create());
    });
});

it ('reorders cards inside columns successfully', function () {
    // Prepare payload
    $payload = $this->board->columns->map(function ($column) {
        return [
            'id' => $column->id,
            'cards' => $column->cards->map(function ($card) {
                return [
                    'id' => $card->id,
                    'position' => $card->position,
                ];
            })->toArray(),
        ];
    })->toArray();

    // Visit the board page
    actingAs($this->user)
        ->get(route('boards', ['board' => $this->board->id]));

    // Do a reorder
    actingAs($this->user)
        ->followingRedirects()
        ->put(route('cards.reorder'), ['columns' => $payload])
        ->assertOk()
        ->assertInertia(
          fn(AssertableInertia $page) => $page
            ->component('Kanban')
            ->has('board.data', 3)
            ->has('board.data.columns.0', fn (AssertableInertia $assert) => $assert
                ->has('cards', 2)
                ->etc()
            )
              ->has('board.data.columns.1', fn (AssertableInertia $assert) => $assert
                  ->has('cards', 2)
                  ->etc()
              )
        );
})->only();