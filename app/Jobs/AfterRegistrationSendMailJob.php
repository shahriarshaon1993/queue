<?php

namespace App\Jobs;

use App\Mail\RegistrationSuccessMail;
use App\Mail\UserReportToAdminMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class AfterRegistrationSendMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user, public Collection $users)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)
            ->send(new RegistrationSuccessMail($this->user));

        Mail::to('shaon@admin.com')
            ->send(new UserReportToAdminMail($this->users));
    }
}
