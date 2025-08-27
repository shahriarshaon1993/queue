<?php

namespace App\Http\Controllers;

use App\Jobs\LoginOtpSendingMailJob;
use App\Jobs\SendingSmsMailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function sendSms()
    {
        $users = User::all();

        foreach ($users as $user) {
            dispatch(new SendingSmsMailJob($user));
        }

        return back()->with('success', 'SMS sending initiated.');
    }

    public function sendOtp(User $user)
    {
        dispatch(new LoginOtpSendingMailJob($user))->onQueue('heigh');

        return back()->with('success', 'OTP sending initiated.');
    }
}
