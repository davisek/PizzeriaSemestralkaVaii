@extends('admin.layoutAdmin')
@section('titleAdmin', 'Uzivatelia')
@section('contentAdmin')
    <div class="col-md-10">
        @if(session('success'))
            <div role='alert' class="alert alert-success in center">{{session('success')}}</div>
        @endif
        <div class="row center mt-2 userListHeader">
            <div class="col-lg-3">
                <h2>Meno</h2>
            </div>
            <div class="col-lg-3">
                <h2>Priezvisko</h2>
            </div>
            <div class="col-lg-2">
                <h2>Prihlasovací email</h2>
            </div>
            <div class="col-lg-2">
                <h2>Rola</h2>
            </div>
            <div class="col-xl-2 col-6 text-center">
                <a href="/admin/add/user">
                    <button class="btn btn-success px-3 py-1">
                        + Pridať
                    </button>
                </a>
            </div>
        </div>

        <hr class="mt-1">

        <div id="userList" class="mb-3">
            @foreach($users as $user)
            <x-admin.user-list :user="$user" ></x-admin.user-list>
            @endforeach
        </div>

        <hr>
        <!-- Modal na vymazanie -->
        @include('partials/admin/_user-delete')

    </div>
@endsection
