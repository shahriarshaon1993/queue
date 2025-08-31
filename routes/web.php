<?php

use App\Http\Controllers\ProfileController;
use App\Jobs\ProcessReportJob;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('process-report', function () {
        // \App\Jobs\ProcessReportJob::dispatch(1);
        // \App\Jobs\ProcessReportJob::dispatch(2);
        // \App\Jobs\ProcessReportJob::dispatch(3);
        // \App\Jobs\ProcessReportJob::dispatch(4);
        // \App\Jobs\ProcessReportJob::dispatch(5);

        dispatch(new ProcessReportJob(1));
        dispatch(new ProcessReportJob(2));
        dispatch(new ProcessReportJob(3));
        dispatch(new ProcessReportJob(4));
        dispatch(new ProcessReportJob(5));

        return back()->with('success', 'Report processing job dispatched!');
    })->name('process.report');
});

require __DIR__ . '/auth.php';
