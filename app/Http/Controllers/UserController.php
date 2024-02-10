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
    // Index Users Page
    public function index() {
        $users = User::orderByRaw("role_id = (SELECT id FROM roles WHERE name = 'customer') ASC")
            ->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function addUser() {
        $roles = Role::all();
        return view('admin.users.add', ['roles' => $roles]);
    }

    // Create Register Form
    public function registration() {
        return view('users.registration');
    }

    // Create Login Form
    public function login() {
        return view('users.login');
    }

    // Create Admin Login Form
    public function loginAdmin() {
        return view('admin.users.login');
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
        $role = Role::where('name', 'customer')->first();
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

    // Update Private Information
    public function updatePrivate(Request $request) {
        $inputs = $request->validate([
           'name' => ['required', 'max:250'],
           'surname' => ['required', 'max:250'],
           'email' => ['required', 'email', 'max:250', Rule::unique('users', 'email')->ignore(auth()->id())]
        ]);

        $user = auth()->user();
        $user->update($inputs);
        Session::flash('success', 'Informácie boli úspešne zmenené');
        return back();
    }

    // Update Password
    public function updatePassword(Request $request) {
        $inputs = $request->validate([
            'password' => ['required', 'min:6', 'confirmed']
        ]);
        $inputs['password'] = bcrypt($inputs['password']);

        $user = auth()->user();
        $user->update($inputs);
        Session::flash('success', 'Heslo bolo úspešne zmenené');
        return back();
    }

    // Authenticate Login Admin
    public function authenticateAdmin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Role::where('id', auth()->user()->role_id)->value('name');
            if ($role !== 'customer') {
                return redirect('/admin/pizzas');
            } else {
                return redirect('/');
            }
        }
        return back()->withErrors(['email' => 'Zadané údaje sa nezhodujú.'])->onlyInput('email');
    }

    // Delete User From Admin Page
    public function destroy(User $user) {
        $user->delete();
        Session::flash('success', 'Užívateľ bol úspešne odstránený zo zoznamu.');
        return back();
    }

    // Admin Store User
    public function storeUser(Request $request) {
        $inputs = $request->validate([
            'name' => ['required', 'max:250'],
            'surname' => ['required', 'max:250'],
            'email' => ['required', 'email', 'max:250', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed'],
            'role_id' => ['required']
        ]);

        $role = Role::where('id', $inputs['role_id'])->value('name');
        if (auth()->user()->role->name == 'manager' && $role == 'admin') {
            abort('Nemáte k tejto operácií prístup', 419);
        }
        $inputs['password'] = bcrypt($inputs['password']);

        $newUser = User::create($inputs);

        return redirect('/admin/users')->with('success', 'Užívateľ bol úspešne pridaný');
    }
}
