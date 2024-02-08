@props(['review'])
<div class="card bg-dark text-light mb-5">
    <div class="card-header">
        {{$review->date}}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$review->user->name . ' ' . $review->user->surname}}</h5>
        <p class="card-text">{{$review->review}}</p>
    </div>
</div>
