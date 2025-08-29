<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateQueueJobCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:generate-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new queue job class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dispatch(new \App\Jobs\CalculateMarksJob());
    }
}
