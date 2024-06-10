<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Roles;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function new(Request $request): View
    {
        return view('new-user');
    }
    public function edit(Request $request): View
    {
        $user = User::with('role')->find($request->id);

        return view('pages.admin.forms.edit-user', [
            'user' => $user,
            'new' => false,
        ]);
    }

    public function handleEdit(Request $request)
    {
        $currUser = $request->user();
        $user = User::with('role')->find($request->id);

        if ($user->role->name === Roles::Root->value
            && $currUser->role()->first()->name !== Roles::Root->value) {
            // root user cannot be edited
            return redirect()->back()->withErrors(['error' => 'Tikai galvenais lietotājs var rediģēt šo lietotāju']);
        }
        echo $user;





        //return with errors
//        return redirect()->back()->withErrors(['error' => 'User cannot be edited']);
        //redirect to users
//        return redirect()->route('users');
    }
}
