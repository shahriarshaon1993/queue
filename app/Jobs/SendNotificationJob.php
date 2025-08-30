<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendNotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $userId)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "{$this->userId}: Notification sent.\n";

        sleep(1);

        Log::info("{$this->userId}: Notification sent to user: [name]");

        echo "{$this->userId}: Job completed.\n";
    }

    public function middleware()
    {
        return [new \App\Jobs\Middleware\CheckUserActive];
    }
}
