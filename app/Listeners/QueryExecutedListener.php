<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class QueryExecutedListener
{
    public function handle(QueryExecuted $event): void
    {
        Log::channel('sql_query')->info(
            'SQL Query',
            [
                $event->sql,
                $event->bindings,
                $event->time,
            ]
        );
    }
}
