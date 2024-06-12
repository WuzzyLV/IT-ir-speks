<?php

namespace App\Http\Controllers;

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
    public function new(Request $request): View
    {
        return view('pages.admin.forms.edit-vacancy', [
            'vacancy' => null,
            'new' => true,
        ]);
    }

    public function handleNew(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'desc' => 'required',
            'website' => 'required',
            // 'file_id' => 'required',
            'city' => 'required',
            'workload' => Rule::in(['Pilna', 'Nepilna']),
            'salary' => 'required',
            'deadline' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            ]);

        }

        $vacancy = new Vacancy();
        $vacancy->name = $request->name;
        $vacancy->company = $request->company;
        $vacancy->desc = $request->desc;
        $vacancy->website = $request->website;
        // $vacancy->file_id = $request->file_id;
        $vacancy->city = $request->city;
        $vacancy->workload = $request->workload;
        $vacancy->salary = $request->salary;
        $vacancy->deadline = $request->deadline;
        $vacancy->save();

        // return redirect()->route('admin-vacancies');
    }

    public function edit(Request $request): View
    {
        $vacancy = Vacancy::find($request->id);

        return view('pages.admin.forms.edit-vacancy', [
            'vacancy' => $vacancy,
            'new' => false,
        ]);
    }

    public function handleEdit(Request $request)
    {
        $vacancy = Vacancy::find($request->id);

        return view('pages.admin.forms.edit-vacancy', [
            'vacancy' => $vacancy,
            'new' => false,
        ]);
    }
}
