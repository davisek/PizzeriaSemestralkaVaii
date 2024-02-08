@extends('layout')

@section('content')
<x-nav />
<section id="review" class="pizzaMenu">
    <div class="container py-5" id="appReviews">
        <h2 class="mb-5">Recenzie</h2>
        @auth
        @unless($hasReview)
        <x-review-form />
        @else
        <div role='alert' class="alert alert-success in center mb-5"> Recenziu ste už úspešne uverejnili. </div>
        @endunless
        @else
        <p>Musíte sa prihlásiť, aby ste vedeli pridávať recenziu!</p>
        @endauth
        @unless(count($reviews) == 0)
            @foreach($reviews as $review)
            <x-review :review="$review" />
            @endforeach
        @else
        <p>Neexistujú žiadne recenzie.</p>
        @endunless
    </div>
</section>
@endsection
