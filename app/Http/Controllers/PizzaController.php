<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PizzaController extends Controller
{
    // About Page
    public function aboutPage() {
        return view('pizzas.about');
    }

    // Services Page
    public function servicesPage() {
        return view('pizzas.services');
    }

    // All Pizzas
    public function index() {
        $pizzas = Pizza::all();
        return view('pizzas.index', ['pizzas' => $pizzas]);
    }

    // All Pizzas
    public function indexAdmin() {
        $pizzas = Pizza::all();
        return view('admin.pizzas.index', ['pizzas' => $pizzas]);
    }

    // All Not Favorite Pizzas
    public function allNotFavorite() {
        $user_id = auth()->id();
        $pizzas = Pizza::whereDoesntHave('favorites', function ($query) use ($user_id) {
           $query->where('user_id', $user_id);
        })->get();
        return $pizzas;
    }

    // Delete Pizza From Admin Page
    public function destroy(Pizza $pizza) {
        $img = $pizza->img;
        $pizza->delete();
        if ($img && Storage::disk('public')->exists($img)) {
            Storage::delete('public/' . $img);
        }

        Session::flash('success', 'Pizza bola úspešne odstránená zo zoznamu.');
        return back();
    }

    // Store Pizza
    public function store(Request $request) {
        $inputs = $request->validate([
            'name' => ['required', 'max:50', Rule::unique('pizzas', 'name')],
            'ingredients' => ['required', 'max:500'],
            'weight' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg']
        ]);

        $inputs['img'] = $request->file('img')->store('pizzaImages','public');

        Pizza::create($inputs);
        return redirect('/admin/pizzas')->with('success', 'Pizza bola vytvorená.');
    }

    // Edit Pizza
    public function edit(Pizza $pizza) {
        return view('admin.pizzas.edit', ['pizza' => $pizza]);
    }

    // Update Pizza
    public function update(Request $request, Pizza $pizza) {
        $inputs = $request->validate([
            'name' => ['required', 'max:50', Rule::unique('pizzas', 'name')->ignore($pizza->id)],
            'ingredients' => ['required', 'max:500'],
            'weight' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'img' => ['image', 'mimes:jpeg,png,jpg']
        ]);

        if ($request->hasFile('img')) {
            Storage::delete('public/' . $pizza->img);
            $inputs['img'] = $request->file('img')->store('pizzaImages','public');
        }

        $newPizza = $pizza;
        $newPizza->update($inputs);
        //Session::flash('success', 'Informácie pizze boli úspešne zmenené');
        return redirect('/admin/pizzas')->with('success', 'Informácie pizze boli úspešne zmenené.');
    }
}
