<?php

namespace App\Jobs\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

class RateLimitNotifications
{
    /**
     * Process the queued job.
     *
     * @param  \Closure(object): void  $next
     */
    public function handle(object $job, Closure $next): void
    {
        $key = 'notification:' . $job->userId;
        $maxAttempts = 5;
        $decaySeconds = 60;

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            Log::warning("Rate limit exceeded for user {$job->userId}. Delaying job.");
            $job->release(10); // Will try again in 60 seconds.

            return;
        }

        //  Every time a job is processed, the count increases.
        RateLimiter::hit($key, $decaySeconds);

        $next($job);
    }
}
