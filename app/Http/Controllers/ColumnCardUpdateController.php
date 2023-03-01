<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Http\RedirectResponse;

class ColumnCardUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateCardRequest $request, Column $column, Card $card): RedirectResponse
    {
        $card->update($request->all());
        return back();
    }
}
