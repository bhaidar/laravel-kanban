<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function show(Request $request, Board $board)
    {
         // Case when no board is passed over
         if (!$board->exists) {
            $board = $request->user()->boards()->first();
        }

        // eager load columns with their cards
        $board?->loadMissing(['columns.cards']);

        return inertia('Kanban', [
            'board' => $board ? BoardResource::make($board) : null,
        ]);
    }
}
