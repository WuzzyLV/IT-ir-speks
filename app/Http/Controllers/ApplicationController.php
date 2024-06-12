<?php

namespace App\Http\Controllers;

use App\Helpers\FileUtils;
use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function apply(Request $request)
    {
        echo "apply";
        $request->validate([
            'id' => 'required|exists:vacancies,id',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = FileUtils::store($request->file('cv'),"cv"); //make private somehow

        $application = new Application();
        $application->name = $request->name;
        $application->surname = $request->surname;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->vacancy()->associate(Vacancy::find($request->id));
        $application->file()->associate($file);
        $application->save();

        return redirect()->route('vacancy', ['id' => $request->id])
            ->with('success', 'Pieteikums nosūtīts');
    }

    public function test()
    {
        echo "test1243213";
    }
}
