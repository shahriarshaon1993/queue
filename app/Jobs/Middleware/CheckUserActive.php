<?php

namespace App\Jobs\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class CheckUserActive
{
    /**
     * Process the queued job.
     *
     * @param  \Closure(object): void  $next
     */
    public function handle(object $job, Closure $next): void
    {
        $isActive = rand(0, 1);

        if (!$isActive) {
            Log::warning("User is not active. Job skipped.");

            return;
        }

        $next($job);
    }
}
