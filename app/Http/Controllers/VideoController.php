<?php

namespace App\Http\Controllers;

use App\Jobs\AfterVideoUploadedNotificationJob;
use App\Jobs\CalculateMarkForSingleClassJob;
use App\Jobs\ProcessVideoJob;
use App\Jobs\TakeDatabaseBackupJob;
use App\Jobs\UploadVideoJob;
use Exception;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class VideoController extends Controller
{
    public function upload()
    {
        $batch = Bus::batch([
            new UploadVideoJob(),
            new UploadVideoJob(),
            new UploadVideoJob(),
            new AfterVideoUploadedNotificationJob(),
        ])
            ->then(function (Batch $batch) {
                echo "All videos uploaded successfully. Batch ID: " . $batch->id . "\n";
            })
            ->catch(function (Batch $batch, Exception $e) {
                echo "Batch failed. Batch ID: " . $batch->id . "\n";
            })
            ->finally(function (Batch $batch) {
                echo "Batch finished. Batch ID: " . $batch->id . "\n";
            })
            ->dispatch();

        echo "Uploading video to batch ID: " . $batch->id . "\n";
    }

    public function observeBatch($id)
    {
        $batch = Bus::findBatch($id);

        dd($batch);
    }
}
