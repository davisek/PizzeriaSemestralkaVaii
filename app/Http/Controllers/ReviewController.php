<?php

namespace App\Http\Controllers;

use App\Models\Review;
use DateTime;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Get All Reviews
    public function index() {
        return view('reviews.index');
    }

    public function getApi() {
        $reviews = Review::with('user:id,name,surname')
            ->orderBy('date', 'desc')
            ->get();
        if(auth()->check()) {
            $id = auth()->id();
            $hasReview = Review::where('user_id', $id)->exists();
            return ['reviews' => $reviews, 'hasReview' => $hasReview];
        }
        return ['reviews' => $reviews];
    }

    // Store New Review
    public function store(Request $request) {
        $userId = auth()->user()->id;

        if (Review::where('user_id', $userId)->exists()) {
            return response()->json(['error' => 'Už ste pridali recenziu.'], 422);
        }

        $inputs = $request->validate([
            'review' => ['required', 'max:500'],
        ]);
        $inputs['user_id'] = $userId;
        $inputs['date'] = new DateTime();

        Review::create($inputs);
        return response()->json(['message' => 'Recenzia bola úspešne pridaná.']);
    }
}
