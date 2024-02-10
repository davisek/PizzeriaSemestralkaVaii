@extends('layout')
@section('title', 'Denne Menu')
@include('partials/_nav')
@section('content')
<div class="pizzaMenu container-fluid" id="app">
    <div class="text-center py-4">
        <h2 class="mb-3">DENNÉ MENU</h2>
        <p>Z bohatej ponuky našich pizz Vám na dnešný deň aktuálne ponúkame tieto položky. <br> Prajeme vám dobrú chuť.</p>
    </div>

    <div class="row pb-5">
        @php $count = 0; @endphp
        @foreach($pizzas as $pizza)
        @php $count++; @endphp
        @if($count > 6)
            @break
        @endif
        <x-common.pizza-today :pizza="$pizza" :count="$count" />
        @endforeach
    </div>

    <div class="ourPrices text-center container pb-5">
        <h2 class="mb-3">NAŠE CENY ZA MENU</h2>
        <p>Naša kompletná ponuka pizz. Vyberte si z bohatej ponuky nášho jedálneho lístka. <br>
            Prajeme Vám dobrú chuť.</p>
        <div class="row priceMenu">

            @foreach($pizzas as $pizza)
            <x-common.pizza-complet :pizza="$pizza" />
            @endforeach
        </div>
    </div>
</div>
@endsection
