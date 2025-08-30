<?php

namespace App\Http\Controllers;

use App\Jobs\CalculateMarkForSingleClassJob;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function calculateMarks()
    {
        for ($class = 1; $class <= 10; $class++) {
            CalculateMarkForSingleClassJob::dispatch($class);
        }

        return back()->with('success', 'Marks calculation jobs dispatched successfully.');
    }
}
