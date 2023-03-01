<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardsReorderUpdateRequest;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Fluent;

class CardsReorderUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CardsReorderUpdateRequest $request): RedirectResponse
    {
        $data = collect($request->columns)
            ->recursive() // make all nested arrays a collection
            ->map(function ($column) {
                return $column['cards']->map(function ($card) use ($column) {
                    return ['id' => $card['id'], 'position' => $card['position'], 'column_id' => $column['id']];
                });
            })
            ->flatten(1)
            ->toArray();

        // Batch
        Card::query()->upsert($data, ['id'], ['position', 'column_id']);

        return back();
    }
}
