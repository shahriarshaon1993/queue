<?php

namespace App\Http\Controllers;

use App\Jobs\AfterVideoUploadedNotificationJob;
use App\Jobs\CalculateMarkForSingleClassJob;
use App\Jobs\ProcessVideoJob;
use App\Jobs\TakeDatabaseBackupJob;
use App\Jobs\UploadVideoJob;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class VideoController extends Controller
{
    public function upload()
    {
        dispatch(new TakeDatabaseBackupJob());

        Bus::chain([
            new UploadVideoJob(),
            new ProcessVideoJob(),
            new AfterVideoUploadedNotificationJob(),
        ])
            ->onQueue('video')
            ->catch(function (Exception $e) {
                echo "Video processing failed: " . $e->getMessage() . "\n";
            })
            ->dispatch();

        echo "Uploading...\n";

        dispatch(new CalculateMarkForSingleClassJob(1));
    }
}
