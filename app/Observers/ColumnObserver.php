<?php

namespace App\Observers;
use App\Models\Column;

class ColumnObserver
{
    public function deleting (Column $column): void
    {
        $column->cards()->delete();
    }
}
