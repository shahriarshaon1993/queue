<?php

namespace App\Http\Controllers;

use App\Jobs\TakeDatabaseBackupJob;
use Illuminate\Http\Request;

class DatabaseBackupController extends Controller
{
    public function create()
    {
        dispatch(new TakeDatabaseBackupJob());

        return back()->with('success', 'Database backup created successfully.');
    }
}
