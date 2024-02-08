@props(['pizza'])
<div class="col-lg-6 row my-2" >
    <div class="col-lg-2">
        <img src="{{asset('storage/' . $pizza->img)}}" alt="pizza">
    </div>
    <div class="col-lg-10 row">
        <div class="col-2 text-left">
            <p class="mb-0"><b>{{$pizza->name}}</b></p>
        </div>
        <div class="col-10 text-right">
            <p class="mb-0">{{$pizza->weight}} g&nbsp;&nbsp;&nbsp;<b>{{$pizza->price}} €</b></p>
        </div>
        <div class="col-12 text-left">
            <p>{{$pizza->ingredients}}</p>
        </div>
    </div>
</div>
