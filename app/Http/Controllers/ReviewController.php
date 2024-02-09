<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Get All Reviews
    public function index() {
        $reviews = Review::with('user:id,name,surname')
            ->orderBy('date', 'desc')
            ->get();
        if(auth()->check()) {
            $id = auth()->id();
            $hasReview = Review::where('user_id', $id)->exists();
            return view('reviews.index', ['reviews' => $reviews], ['hasReview' => $hasReview]);
        }
        return view('reviews.index', ['reviews' => $reviews]);
    }

    // Store New Review
    public function store(Request $request) {

        $userId = auth()->id();

        if (Review::where('user_id', $userId)->exists()) {
            return back()->withErrors('message', 'Už ste pridali recenziu.');
        }

        $inputs = $request->validate([
            'review' => ['required', 'max:500'],
        ]);
        $inputs['user_id'] = $userId;
        $inputs['date'] = new DateTime();

        Review::create($inputs);
        return redirect('/reviews');
    }
}
