<?php

namespace App\Jobs;

use App\Mail\SendingSmsMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendingSmsMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $isCheck = rand(0, 1);

        if ($isCheck === 0) {
            throw new \Exception('Failed to send SMS');
        }

        Mail::to($this->user->email)
            ->send(new SendingSmsMail($this->user));
    }

    public function failed($exception)
    {
        Log::info("SMS not send to {$this->user->email}");

        Mail::send([], [], function ($message) {
            $message->to('admin@example.com')
                ->subject('SMS Sending Failed')
                ->html(
                    'We are sorry, but we were unable to send you the SMS at this time. Please try again later.'
                );
        });
    }
}
