@props(['pizza', 'count'])
<div class="col-xl-4 col-lg-12 col-12">
    <div class="row">
        @if($count < 4)
            <div class="col-lg-6 pizzaBg text-center p-0">
                <img src="{{asset('storage/' . $pizza->img)}}" alt="pizza">
            </div>
        @endif
        <div class="col-lg-6 pt-3 pizzaInfo">
            <h3>{{$pizza->name}}</h3>
            <p>{{$pizza->ingredients}}</p>
            <p class="price">{{$pizza->price}} €</p>
        </div>
        @if($count > 3)
            <div class="col-lg-6 pizzaBg text-center p-0">
                <img src="{{asset('storage/' . $pizza->img)}}" alt="pizza">
            </div>
        @endif
    </div>
</div>
