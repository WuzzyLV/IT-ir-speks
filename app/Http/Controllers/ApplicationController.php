<?php

namespace App\Http\Controllers;

use App\Helpers\FileUtils;
use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Status;

class ApplicationController extends Controller
{

    public function view(Request $request): View
    {
        $perPage= 7;
        $page= $request->input('page', 1);

        $total_pages= ceil(Application::count()/$perPage);
        return view('pages.admin.applications', [
            'page' => $page,
            'total_pages' => $total_pages,
            'applications' => Application::paginate($perPage, ['*'], 'page', $page),
        ]);
    }
    public function viewPage(Request $request): View
    {
        $application = Application::findOrFail($request->id);
        return view('pages.admin.application-page', ['application' => $application]);
    }


    public function apply(Request $request)
    {
        echo "apply";
        $request->validate([
            'id' => 'required|exists:vacancies,id',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:10240',
            ''
        ]);

        $status = Status::where('status', 'pending')->first(); 

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
        $application->status_id = $status->id;
        $application->save();

        return redirect()->route('vacancy', ['id' => $request->id])
            ->with('success', 'Pieteikums nosūtīts');
    }

    public function destroy(Request $request){
        $application = Application::findOrFail($request->id);
        $application->delete();
        return redirect()->route('applications')->with('success', 'Pieteikums veiksmīgi dzēsts');
    }

    public function edit(Request $request)
{
    $statuses = Status::all();
    return view('view-application', compact('application', 'statuses'));
}


}
