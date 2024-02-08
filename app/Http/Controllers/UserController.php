<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Create Register Form
    public function registration() {
        return view('users.registration');
    }

    // Create Login Form
    public function login() {
        return view('users.login');
    }

    // Show Settings Page
    public function settings() {
        return view('users.settings');
    }

    // Store New User
    public function store(Request $request) {
        $inputs = $request->validate([
            'name' => ['required', 'max:250'],
            'surname' => ['required', 'max:250'],
            'email' => ['required', 'email', 'max:250', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $inputs['password'] = bcrypt($inputs['password']);
        $role = Role::where('name', 'admin')->first();
        $inputs['role_id'] = $role->id;
        $newUser = User::create($inputs);

        auth()->login($newUser);

        return redirect('/');
    }

    // Authenticate Login User
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Zadané údaje sa nezhodujú.'])->onlyInput('email');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Edit Private Information
    public function updatePrivate(Request $request) {
        $inputs = $request->validate([
           'name' => ['required', 'max:250'],
           'surname' => ['required', 'max:250'],
           'email' => ['required', 'email', 'max:250', Rule::unique('users', 'email')->ignore(auth()->id())]
        ]);

        $user = Auth::user();
        $user->update($inputs);
        Session::flash('success', 'Informácie boli úspešne zmenené');
        return back();
    }

    // Edit Password
    public function updatePassword(Request $request) {
        $inputs = $request->validate([
            'password' => ['required', 'min:6', 'confirmed']
        ]);
        $inputs['password'] = bcrypt($inputs['password']);

        $user = Auth::user();
        $user->update($inputs);
        Session::flash('success', 'Heslo bolo úspešne zmenené');
        return back();
    }


}
