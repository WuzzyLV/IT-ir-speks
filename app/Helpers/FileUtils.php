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
    
}
