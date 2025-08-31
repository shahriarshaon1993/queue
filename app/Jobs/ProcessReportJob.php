<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\Skip;
use Illuminate\Support\Facades\Log;

class ProcessReportJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $reportId)
    {
        //
    }

    public function middleware(): array
    {
        return [
            new Skip($this->reportId === 3),
        ];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Processing report with ID: {$this->reportId}");
    }
}
