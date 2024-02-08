<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
    // Get All Favorites
    public function index() {
        $favorites = Favorite::all()->where('user_id', auth()->id());
        return view('pizzas.favorites', ['favorites' => $favorites]);
    }

    // Delete Favorite Pizza
    public function destroy(Favorite $favorite) {
        $favorite->delete();
        Session::flash('success', 'Obľúbená pizza bola úspešne odstránená zo zoznamu.');
        return back();
    }
}
