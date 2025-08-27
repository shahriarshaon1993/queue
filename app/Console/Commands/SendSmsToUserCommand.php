<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class SendSmsToUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:send-sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send SMS to user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = \App\Models\User::all();

        $users->each(function ($user) {
            $queueName = Arr::random(['default', 'custom'], 1)[0];
            echo "{$user->email} to Queue: {$queueName}" . PHP_EOL;

            dispatch(new \App\Jobs\SendingSmsMailJob($user))
                ->onQueue($queueName);
        });

        echo "{$users->count()} sms have been dispatched." . PHP_EOL;
    }
}
