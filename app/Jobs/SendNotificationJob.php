<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\WithoutOverlapping;
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
        Log::info("{$this->userId}: Notification sent to user: [name]");

        sleep(seconds: 15);

        Log::info("{$this->userId}: Notification process completed.");
    }

    public function middleware(): array
    {
        return [
            // There will be no overlap for the same user.
            (new WithoutOverlapping($this->userId))->expireAfter(120)
        ];
    }
}
