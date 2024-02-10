@extends('admin.layoutAdmin')
@section('titleAdmin', 'Pizze')
@section('contentAdmin')
<div class="col-md-10">
    @if(session('success'))
    <div role='alert' class="alert alert-success in center">{{session('success')}}</div>
    @endif
    <div class="row center mt-2">
        <div class="col-lg-1">
            <h2>Obrázok</h2>
        </div>
        <div class="col-lg-1">
            <h2>Meno&nbsp;pizze</h2>
        </div>
        <div class="col-lg-6">
            <h2>Ingrediencie&nbsp;do&nbsp;pizze</h2>
        </div>
        <div class="col-lg-1">
            <h2>Váha</h2>
        </div>
        <div class="col-lg-1">
            <h2>Cena</h2>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-xl col-6 text-center">
            <button class='btn btn-success px-3 py-1' data-toggle='modal' data-target='#addPizza'>+ Pridať</button>
        </div>
    </div>

    <hr class="mt-1">

    <div id="pizzaList" class="mb-3">
        @foreach($pizzas as $pizza)
        <x-admin.pizza-list :pizza="$pizza" ></x-admin.pizza-list>
        @endforeach
    </div>

    <hr>
    <!-- Modal na vymazanie -->
    @include('partials/admin/_pizza-delete')

    <!-- Modal na pridanie -->
    @include('partials/admin/_pizza-add')

</div>
@endsection
