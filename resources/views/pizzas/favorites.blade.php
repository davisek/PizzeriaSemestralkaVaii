@extends('layout')
@section('title', 'Obľúbené Pizze')
@include('partials/_nav')
@section('content')
<section id="favoritePizzas" class="pizzaMenu">
    <add-favorite-pizza-modal></add-favorite-pizza-modal>
</section>
@endsection
