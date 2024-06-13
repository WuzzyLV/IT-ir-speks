<?php

namespace App\Helpers;
use App\Models\Application;
use App\Models\Files;

class FileUtils{

    public static function store($file, $subPath= "images"): Files
    {
        $fileName = $file->getClientOriginalName();

        $storage=null;
        if ($subPath == "cv") {
            $storage = 'private';
        } else {
            $storage = 'public';
        }
        $filePath = $file->store($subPath, $storage);

        echo $fileName;
        // Store file information in the database
        $file = Files::create([
            'filename' => $fileName,
            'file_path' => $filePath
        ]);

        return $file;
    }

    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
    
}
