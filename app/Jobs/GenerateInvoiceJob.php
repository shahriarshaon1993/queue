<?php

namespace App\Jobs;

use DateTime;
use Exception;
use Illuminate\Http\Client\RequestException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\ThrottlesExceptions;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GenerateInvoiceJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $orderId)
    {
        //
    }

    public function middleware(): array
    {
        return [new ThrottlesExceptions(10, 5 * 60)];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Running job at " . now());

        // Always throwing an Exception (to force a failure)
        throw new Exception("Test Exception - " . now());
    }

    public function retryUntil(): DateTime
    {
        return now()->addMinutes(30);
    }
}
