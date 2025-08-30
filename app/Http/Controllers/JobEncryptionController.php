<?php

namespace App\Http\Controllers;

use App\Jobs\JobEncryption;
use Illuminate\Http\Request;

class JobEncryptionController extends Controller
{
    public function encryption()
    {
        for ($i = 0; $i < 10; $i++) {
            JobEncryption::dispatch();
        }

        return back()->with('success', 'Jobs dispatched!');
    }
}
