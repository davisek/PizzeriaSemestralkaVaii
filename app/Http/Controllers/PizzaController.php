<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

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

    // All Not Favorite Pizzas
    public function allNotFavorite() {
        return Pizza::all();
    }
}
