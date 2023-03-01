<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'column_id',
        'position',
    ];

    public function column(): BelongsTo
    {
        return $this->belongsTo(Column::class);
    }
}
