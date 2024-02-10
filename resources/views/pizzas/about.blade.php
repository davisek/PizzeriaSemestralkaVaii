@extends('layout')
@section('title', 'O Nas')
@include('partials/_nav')
@section('content')
<div id="aboutUs" class="aboutUs container-fluid">
    <div class="row">
        <div class="col-lg-5 aboutUsImg py-5">

        </div>
        <div class="col-lg-7 text-center aboutUsText p-5">
            <h3>REŠTAURÁCIA <img src="{{asset('/images/pizzaIcon.png')}}" alt="icon"><span>PIZZA</span> VÁS VÍTA</h3>
            <p class="mt-5 text-lg-left mb-5">Reštaurácia Pizza je ideálnym miestom kde si v príjemnom rodinnom prostredí môžete
                vychutnať pizzu a mnoho ďalších špecialít našej kuchyne. Okrem výborného jedla,
                posedenia vo fajčiarskych aj nefajčiarskych priestoroch sme pre Vaše deti v areáli
                reštaurácie Pizza pripravili detské ihrisko so šmýkľavkou, hojdačkami a preliezkami a
                wifi pripojenie v celom areáli reštaurácie. Okrem výborného jedla Vám ponúkame možnosť
                usporiadania rôznych osláv, rodinných príležitostí či firemných stretnutí.</p>
            <button class="mt-4">Viac o nás</button>
        </div>
    </div>
</div>
@endsection
