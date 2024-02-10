@props(['pizza'])
<div class="row pizzaRow p-1">
    <div class="col-lg-1">
        <img src="{{asset('storage/' . $pizza->img)}}" alt="pizza">
    </div>
    <div class="col-lg-1 mt-2">
        <h2>{{$pizza->name}}</h2>
    </div>
    <div class="col-lg-6 mt-2">
        <p>{{$pizza->ingredients}}</p>
    </div>
    <div class="col-lg-1 mt-2">
        <p>{{$pizza->weight}} g</p>
    </div>
    <div class="col-lg-1 mt-2">
        <p>{{$pizza->price}} € </p>
    </div>
    <div class="col-xl col-6 text-center mt-2">
        <a href="/admin/edit/pizza/{{$pizza->id}}">
            <button class="btn btn-warning p-1">
                Zmeniť
            </button>
        </a>
    </div>
    <div class="col-xl col-6 text-center mt-2">
        <button class="btn btn-danger p-1" data-toggle="modal" data-target="#deletePizza" data-delete-id="{{$pizza->id}}" data-delete-name="{{$pizza->name}}">
            Odstrániť
        </button>
    </div>
</div>
