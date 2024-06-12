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

        //check if there arent applications to this vacancy with the same email or name and surname
        $existingApplication = Application::where('vacancy_id', $request->id)
            ->where(function ($query) use ($request) {
                $query->where('email', $request->email)
                    ->orWhere(function ($query) use ($request) {
                        $query->where('name', $request->name)
                            ->where('surname', $request->surname);
                    });
            })
            ->first();

        if ($existingApplication) {
            return back()->withErrors(['Tu jau esi pieteicies šai vakancei!']);
        }

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


}
