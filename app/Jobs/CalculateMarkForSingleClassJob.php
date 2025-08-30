<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CalculateMarkForSingleClassJob implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $classId)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "Calculating marks for class ID: {$this->classId}\n";

        sleep(2);

        echo "Completed calculating marks for class ID: {$this->classId}\n";
    }

    public function uniqueId(): int
    {
        return $this->classId;
    }
}
