<?php

namespace App\Http\Controllers;

use App\Helpers\FileUtils;
use App\Models\Role;
use App\Models\Vacancy;
use App\Roles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class VacancyController extends Controller
{
    public function view(Request $request): View
    {
        $vacancy = Vacancy::findOrFail($request->id);
        return view('pages.vacancies.vacancy-page', ['vacancy' => $vacancy]);
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
        if ($file){
            $vacancy->file_id = $file->id;
        }
        $vacancy->save();

        return redirect()->route('admin-vacancies');
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
            'deadline' => 'required',
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
        if ($file){
            $vacancy->file_id = $file->id;
        }
        $vacancy->save();

        return redirect()->route('admin-vacancies');
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
}
