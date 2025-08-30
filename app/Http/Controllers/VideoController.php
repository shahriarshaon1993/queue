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

        $batch = Bus::batch([
            new UploadVideoJob(),
            new UploadVideoJob(),
            new UploadVideoJob(),
            new UploadVideoJob(),
        ])->dispatch();

        echo "Uploading video to batch ID: " . $batch->id . "\n";

        dispatch(new CalculateMarkForSingleClassJob(1));
    }

    public function observeBatch($id)
    {
        $batch = Bus::findBatch($id);

        dd($batch);
    }
}
