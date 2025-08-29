<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CalculateMarksJob implements ShouldQueue
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
        echo "Generating Job...\n";

        for ($i = 1; $i <= 10; $i++) {
            dispatch(new \App\Jobs\CalculateMarkForSingleClassJob($i));
        }

        echo "Completed \n";
    }
}
