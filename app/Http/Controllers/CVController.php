<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function view(Request $request)
    {
        $cv = Application::find($request->id)->file()->first();

        $file = Storage::disk('private')->get($cv->file_path);

        return response($file, 200)
            ->header('Content-Type', Storage::disk('private')->mimeType($cv->file_path))
            ->header('Content-Disposition', 'inline; filename="' . basename($cv->filename) . '"');

    }
}
