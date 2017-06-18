<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use ZipArchive;

class Downloader
{

    public static function download()
    {
        $urlFile = config('geoip.file_url');
        $zipFile = config('geoip.file_zipped');

        $contents = file_get_contents($urlFile);
        Storage::put($zipFile, $contents);
        $zip = new ZipArchive();
        $fileToUnzip = $zip->open(storage_path('app/' . $zipFile));
        if ($fileToUnzip === true) {
            $zip->extractTo(storage_path('app/'));
            $zip->close();
            unlink(storage_path('app/' . $zipFile));
        }
    }
}