<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TakeDatabaseBackupJob implements ShouldQueue, ShouldBeUniqueUntilProcessing
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
        // implement ShouldBeUnique Interface
        // implement ShouldBeUniqueUntilProcessing  Interface

        echo "Starting database backup...\n";

        $filename = 'backup-' . date('Y-m-d_H-i-s') . '.sql';
        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_HOST'),
            env('DB_DATABASE'),
            storage_path('app/public' . $filename)
        );
        system($command);

        sleep(20);

        echo "Database backup completed: " . $filename . "\n";
    }
}
