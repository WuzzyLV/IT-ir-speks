<?php

namespace App\Helpers;
use App\Models\Files;

class FileUtils{

    public static function store($file, $subPath= "images"): Files
    {
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store($subPath, 'public');

        echo $fileName;
        // Store file information in the database
        $file = Files::create([
            'filename' => $fileName,
            'file_path' => $filePath
        ]);

        return $file;
    }
}
