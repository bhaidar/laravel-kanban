<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Column;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Resources\ColumnResource;
use App\Http\Requests\StoreColumnRequest;


class BoardColumnCreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreColumnRequest $request, Board $board): RedirectResponse
    {
        $board->columns()->save(Column::create($request->all()));
        return back();
    }
}
