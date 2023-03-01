<?php

namespace App\Http\Controllers;

use App\Models\Column;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ColumnDestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Column $column): RedirectResponse
    {
        $column->delete();
        return back();
    }
}
