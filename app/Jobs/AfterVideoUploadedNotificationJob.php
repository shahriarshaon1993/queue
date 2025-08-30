<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AfterVideoUploadedNotificationJob implements ShouldQueue
{
    use Queueable, Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "Sending notification after video upload...\n";

        $isCheck = rand(0, 1);

        if ($isCheck === 0) {
            throw new \Exception('Failed to send notification');
        }

        sleep(5);

        echo "Notification sent successfully.\n";
    }
}
