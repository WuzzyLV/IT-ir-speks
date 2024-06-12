<?php

namespace App\Helpers;
use App\Models\Files;

class FileUtils{

    public static function store($file): Files
    {
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        echo $fileName;
        // Store file information in the database
        $file = Files::create([
            'filename' => $fileName,
            'file_path' => $filePath
        ]);
//        $uploadedFile->filename = $fileName;
//        $uploadedFile->original_name = $file->getClientOriginalName();
//        $uploadedFile->file_path = $filePath;

        return $file;
    }
}
