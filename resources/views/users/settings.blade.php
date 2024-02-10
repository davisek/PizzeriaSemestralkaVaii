@extends('layout')
@section('title', 'Nastavenia')
@include('partials/_nav')
@section('content')
<section id="settings">
    <div class="container p-5">
        @if(session('success'))
            <div role='alert' class="alert alert-success in center">{{session('success')}}</div>
        @endif
        <h3>Zmena osobných údajov</h3>
        <form class="p-5 mb-5" method="POST" action="/users/private">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Meno</label>
                <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                @error('name')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="surname">Priezvisko</label>
                <input type="text" class="form-control" name="surname" value="{{auth()->user()->surname}}">
                @error('surname')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Emailová adresa</label>
                <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                @error('email')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning">Potvrdiť zmeny</button>
        </form>

        <h3>Zmena hesla</h3>
        <form class="p-5 mb-5" method="POST" action="/users/password">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="password">Nové heslo</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Potvrdenie nového hesla</label>
                <input type="password" class="form-control" name="password_confirmation">
                @error('password_confirmation')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning">Potvrdiť zmeny</button>
        </form>
    </div>
</section>
@endsection
