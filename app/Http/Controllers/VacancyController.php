<?php

namespace App\Http\Controllers;

use App\Helpers\FileUtils;
use App\Models\News;
use App\Models\Role;
use App\Models\Vacancy;
use App\Roles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Storage;

class VacancyController extends Controller
{
    public function deleteImage($id)
    {
        $vacancy = Vacancy::find($id);

        if (!$vacancy) {
            return response()->json(['error' => 'Vakance nav atrasta'], 404);
        }

        if ($vacancy->file_id) {
            $file = $vacancy->file()->first();
            if ($file) {
                    Storage::delete($file->file_path);

                    // Remove the file reference from the news entry
                    $vacancy->file_id = null;
                    $vacancy->save();

                    // Delete the file record from the database
                    $file->delete();

                    return response()->json(['success' => 'Attēls veikmīgi dzēsts']);
            }
        }

        return response()->json(['error' => 'Attēls nav atrasts'], 404);
    }

    public function view(Request $request): View
    {
        $vacancy = Vacancy::findOrFail($request->id);
        if (!$vacancy->visible) {
            return view('errors.404');
        }
        return view('pages.vacancies.vacancy-page', ['vacancy' => $vacancy]);
    }
    public function clientVacancies(Request $request){
//        echo "client news";
        $perPage= 9;
        $page= $request->input('page', 1);

        $total_pages= ceil(Vacancy::where('visible', true)->count()/$perPage);
        return view('pages.vacancies.vacancies', [
            'page' => $page,
            'total_pages' => $total_pages,
            'vacancies' => Vacancy::where('visible', true)->paginate($perPage, ['*'], 'page', $page),
        ]);
    }

    public function viewCards(Request $request): View
    {
        $perPage= 7;
        $page= $request->input('page', 1);

        $total_pages= ceil(Vacancy::count()/$perPage);
        return view('pages.admin.vacancies', [
            'page' => $page,
            'total_pages' => $total_pages,
            'vacancies' => Vacancy::paginate($perPage, ['*'], 'page', $page),
        ]);
    }

    public function new(Request $request): View
    {
        return view('pages.admin.forms.edit-vacancy', [
            'vacancy' => null,
            'new' => true,
        ]);
    }


    public function handleNew(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'desc' => 'required',
            'content' => 'required',
            'website' => 'required',
            // 'file_id' => 'required',
            'city' => 'required',
            'workload' => Rule::in(['Pilna', 'Nepilna']),
            'deadline' => 'required',
        ]);
        //check if salary or salary min max
        $isSalaryRange=false;
        if ($request->salary_min && $request->salary_max){
            $request->validate([
                'salary_min' => 'required|numeric',
                'salary_max' => 'required|numeric',
            ]);
            if ($request->salary_min>$request->salary_max){
                $temp=$request->salary_min;
                $request->salary_min=$request->salary_max;
                $request->salary_max=$temp;
            }
            $isSalaryRange=true;
        }else{
            $request->validate([
                'salary' => 'required|numeric',
            ]);
        }


        $file=null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,webp,jpg,gif,svg|max:20480',
            ]);
            $file = FileUtils::store($request->file('image'),"logos");
        }

        $vacancy = new Vacancy();
        $vacancy->title = $request->title;
        $vacancy->company = $request->company;
        $vacancy->desc = $request->desc;
        $vacancy->content = $request->content;
        $vacancy->website = $request->website;
        $vacancy->city = $request->city;
        $vacancy->workload = $request->workload;

        if ($isSalaryRange){
            $vacancy->salary_min = $request->salary_min;
            $vacancy->salary_max = $request->salary_max;
        }else{
            $vacancy->salary_min = $request->salary;
            $vacancy->salary_max = $request->salary;
        }


        $vacancy->deadline = $request->deadline;
        $vacancy->visible = $request->visible;
        if ($file){
            $vacancy->file_id = $file->id;
        }
        $vacancy->visible = $this->isVisible($request);
        $vacancy->save();

        return redirect()->route('admin-vacancies')->with('success', 'Vakance veiksmīgi pievienota');
    }

    public function edit(Request $request): View
    {
        $vacancy = Vacancy::find($request->id);

        return view('pages.admin.forms.edit-vacancy', [
            'vacancy' => $vacancy,
            'new' => false,
        ]);
    }

    public function handleEdit(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'desc' => 'required',
            'content' => 'required',
            'website' => 'required',
            // 'file_id' => 'required',
            'city' => 'required',
            'workload' => Rule::in(['Pilna', 'Nepilna']),
            'deadline' => 'required|date',
        ]);

        $isSalaryRange=false;
        if ($request->salary_min && $request->salary_max){
            $request->validate([
                'salary_min' => 'required|numeric',
                'salary_max' => 'required|numeric',
            ]);
            if ($request->salary_min>$request->salary_max){
                $temp=$request->salary_min;
                $request->salary_min=$request->salary_max;
                $request->salary_max=$temp;
            }
            $isSalaryRange=true;
        }else{
            $request->validate([
                'salary' => 'required|numeric',
            ]);
        }

        $file=null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,webp,jpg,gif,svg|max:20480',
            ]);
            $file = FileUtils::store($request->file('image'),"logos");
        }

        $vacancy = Vacancy::find($request->id);
        $vacancy->title = $request->title;
        $vacancy->company = $request->company;
        $vacancy->desc = $request->desc;
        $vacancy->content = $request->content;
        $vacancy->website = $request->website;
        $vacancy->city = $request->city;
        $vacancy->workload = $request->workload;

        if ($isSalaryRange){
            $vacancy->salary_min = $request->salary_min;
            $vacancy->salary_max = $request->salary_max;
        }else{
            $vacancy->salary_min = $request->salary;
            $vacancy->salary_max = $request->salary;
        }


        $vacancy->deadline = $request->deadline;
        $vacancy->visible = $this->isVisible($request);
        if ($file){
            $vacancy->file_id = $file->id;
        }
        $vacancy->save();

        return redirect()->route('admin-vacancies')->with('success', 'Vakance veiksmīgi pievienota');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $vacancy = Vacancy::find($request->id);
        if (!$vacancy) {
            return redirect()->back()->withErrors(['error' => 'Vakance nav atrasta']);
        }

        $vacancy->delete();

        return redirect()->route('admin-vacancies');
    }

    private function isVisible(Request $request): bool
    {
        if (!$request->visible){
            return false;
        }
        return $request->visible === 'on';
    }
}
