<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Roles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function view(Request $request): View
    {
        $perPage= 7;
        $page= $request->input('page', 1);

        $total_pages= ceil(User::count()/$perPage);
        return view('pages.admin.users', [
            'page' => $page,
            'total_pages' => $total_pages,
            'users' => User::with('role')->paginate($perPage, ['*'], 'page', $page),
        ]);
    }

    public function new(Request $request): View
    {
        return view('pages.admin.forms.edit-user', [
            'user' => null,
            'new' => true,
        ]);
    }

    public function handleNew(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'role' => Rule::in(['admin', 'moderator']),
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->role()->associate(Role::where('name', $request->role)->first());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users')->with('success', 'Lietotājs veiksmīgi izveidots');
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
        $roleRules= [];
        if ($user->role->name !== Roles::Root->value) {
            $roleRules[] = Rule::in(['root', 'admin', 'moderator']);
        }
        //check if values exist
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'role' => $roleRules
        ]);

        $user->name = $request->username;
        $user->email = $request->email;
        // if user isint root, then set role
        if ($currUser->role()->first()){
            $user->role()->associate(Role::where('name', $request->role)->first());
            
        }else{
            return redirect()->route('users')->with('success', 'Kļūda redīgējot role!');
        }
        // if password is set, then set password
        if ($request->password != "") {
            $user->password = Hash::make($request->password);
            echo "Password is set";
        }
        $user->save();



        //return with errors
//        return redirect()->back()->withErrors(['error' => 'User cannot be edited']);
        //redirect to users
        return redirect()->route('users')->with('success', 'Lietotājs veiksmīgi rediģēts');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = User::find($request->id);
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Lietotājs nav atrasts']);
        }
        if ($user->role->name === Roles::Root->value) {
            return redirect()->back()->withErrors(['error' => 'Šo lietotāju nevar izdzēst']);
        }
        $user->delete();

        return redirect()->route('users')->with('success', 'Lietotājs veiksmīgi izdzēsts');
    }
}
