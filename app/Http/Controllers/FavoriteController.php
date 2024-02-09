<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
    // Get All Favorites
    public function index() {
        return view('pizzas.favorites');
    }

    public function favoritePizzas() {
        return Favorite::all()->where('user_id', auth()->id());
    }
    // Delete Favorite Pizza
    public function destroy(Favorite $favorite) {
        $favorite->delete();
        Session::flash('success', 'Obľúbená pizza bola úspešne odstránená zo zoznamu.');
        return back();
    }

    // Store Favorite Pizza
    public function store(Request $request) {
        $user_id = auth()->user()->id;

        $inputs = $request->validate([
           'pizza_id' => 'required'
        ]);
        $inputs['user_id'] = $user_id;

        Favorite::create($inputs);
        return response()->json(['message' => 'Pizza bola úspešne pridaná.']);
    }
}
