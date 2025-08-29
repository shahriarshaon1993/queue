<?php

namespace App\Console\Commands;

use App\Jobs\SendingSmsMailJob;
use App\Models\User;
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
        $users = User::all();

        $users->each(function (User $user): void {
            $queueName = Arr::random(['default', 'custom'], 1)[0];

            echo "{$user->email} to Queue: {$queueName}" . PHP_EOL;

            dispatch(new SendingSmsMailJob($user))
                ->onQueue($queueName);
        });

        echo "{$users->count()} sms have been dispatched." . PHP_EOL;
    }
}
