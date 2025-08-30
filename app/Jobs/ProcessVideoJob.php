<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessVideoJob implements ShouldQueue
{
    use Queueable;

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
        echo "Processing video...\n";

        $isCheck = rand(0, 1);

        if ($isCheck === 0) {
            throw new \Exception('Failed to process video');
        }

        sleep(2);

        echo "Video processed successfully.\n";
    }
}
