<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

Artisan::command('storage:sync-to-minio', function () {
    $publicPath = storage_path('app/public');
    if (!File::exists($publicPath)) {
        $this->error('Local public storage directory does not exist.');
        return;
    }

    $files = File::allFiles($publicPath);
    $this->info('Found ' . count($files) . ' files in local public storage.');

    foreach ($files as $file) {
        $relativePath = str_replace('\\', '/', $file->getRelativePathname());
        
        // Skip hidden files
        if (str_starts_with(basename($relativePath), '.')) {
            continue;
        }

        $this->info("Syncing {$relativePath} to MinIO...");

        try {
            $content = file_get_contents($file->getRealPath());
            Storage::put($relativePath, $content);
            $this->info("Successfully uploaded {$relativePath}!");
        } catch (\Exception $e) {
            $this->error("Failed to upload {$relativePath}: " . $e->getMessage());
        }
    }

    $this->info('Sync completed!');
})->purpose('Sync local public files to MinIO');
