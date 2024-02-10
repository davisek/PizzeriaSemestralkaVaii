@extends('layout')
@section('title', 'Sluzby')
@include('partials/_nav')
@section('content')
<div class="service container-fluid pb-5">
    <div class="text-center pt-5">
        <h2 class="mb-4">NAŠE SLUŽBY</h2>
        <p>Každý deň Vás ponúkame najlepšie a najobľúbenejšie jedlá.
            Jedzte zdravo a vychutnajte jedlá pripravované podľa originálnych receptúr. <br>
            Využite našu donáškovú službu.</p>
    </div>
    <div class="row py-5 services">
        <div class="col-lg-4 text-center">
            <img src="{{asset('/images/diet.png')}}" alt="diet">
            <h3 class="mt-5 mb-4">ZDRAVÉ JEDLÁ</h3>
            <p>Stravujte sa s nami zdravo. Jedlá plné ovocia a zeleniny sú pripravované podľa receptov zdravej výživy.</p>
        </div>
        <div class="col-lg-4 text-center">
            <img src="{{asset('/images/delivery.png')}}" alt="diet">
            <h3 class="mt-5 mb-4">RÝCHLA DONÁŠKA</h3>
            <p>Náš rozvoz Vám privezie skvelú pizzu, cestoviny, šaláty a mnohé ďalšie priamo ku Vám domov. Jedlo privezieme najneskôr do 60 minút.</p>
        </div>
        <div class="col-lg-4 text-center">
            <img src="{{asset('/images/pizza.png')}}" alt="diet">
            <h3 class="mt-5 mb-4">ORIGINÁLNE RECEPTY</h3>
            <p>V ponuke nájdete originálnu talianskú pizzu pripravovanú v peci na dubové drevo,cestoviny, čerstvé šaláty a jedlá pripravované podľa vlastných receptúr.</p>
        </div>
    </div>
</div>
@endsection
