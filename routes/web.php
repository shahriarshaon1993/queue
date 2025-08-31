<?php

use App\Http\Controllers\ProfileController;
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

    Route::get('send-notification', function () {
        dispatch(new \App\Jobs\SendNotificationJob(1));
        dispatch(new \App\Jobs\SendNotificationJob(1));
        dispatch(new \App\Jobs\SendNotificationJob(1));

        return back()->with('success', 'Notification job dispatched!');
    })->name('send.notification');
});

require __DIR__ . '/auth.php';
