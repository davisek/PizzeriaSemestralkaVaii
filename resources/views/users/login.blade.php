@extends('layout')

@section('content')
<section id="loginPagePizza">
    <div class="container d-flex justify-content-center text-center p-5">
        <div class="loginForm">
            <div class="mb-3 mx-5">
                <a href="/login" class="btn btn-warning btn-md" role="button">Prihlásenie</a>
                <a href="/registration" class="btn btn-secondary btn-md" role="button">Registrácia</a>
            </div>
            <h3>Login formulár</h3>
            <form class="mt-3" method="POST" action="/authenticate">
                @csrf
                <div class="form-group">
                    <label for="email" class="text-white">Email adresa</label>
                    <input type="email"
                           class="form-control border-top-0 border-right-0 border-left-0 bg-transparent border-warning text-white"
                           name="email"
                           placeholder="Zadaj email"
                           value="{{old('email')}}">
                    @error('email')
                    <div id='alert'>
                        <div role='alert' class="alert alert-danger in center"> {{$message}} </div>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="text-white">Heslo</label>
                    <input type="password"
                           class="form-control border-top-0 border-right-0 border-left-0 bg-transparent border-warning text-white"
                           name="password"
                           placeholder="Zadaj heslo"
                           value="{{old('password')}}">
                    @error('password')
                    <div id='alert'>
                        <div role='alert' class="alert alert-danger in center"> {{$message}} </div>
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Prihlásiť sa</button>
            </form>
            <a href="/" class="btn text-white btn-md mt-2" role="button">Naspäť na stránku...</a>
        </div>
    </div>
</section>
@endsection
