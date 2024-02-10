@extends('admin.layoutAdmin')
@section('titleAdmin', 'Pridaj Uzivatela')
@section('contentAdmin')
    <div class="col-md-10" id="addNewUser">
        <div class="ml-3">
            <h1>Vytvor nového užívateľa</h1>
        </div>
        @if(session('success'))
            <div role='alert' class="alert alert-success in center">{{session('success')}}</div>
        @endif
        <form class="p-5 mb-5" method="POST" action="/admin/store/user">
            @csrf
            <div class="form-group">
                <label for="name">Meno</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error('name')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="surname">Priezvisko</label>
                <input type="text" class="form-control" name="surname" value="{{old('surname')}}">
                @error('surname')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Emailová adresa</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                @error('email')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Nové heslo</label>
                <input type="password" class="form-control" name="password" value="{{old('password')}}">
                @error('password')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Potvrdenie nového hesla</label>
                <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}">
                @error('password_confirmation')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Vyber rolu</label>
                <select name="role_id" class="form-control">
                    @foreach($roles as $role)
                        @unless(auth()->user()->role->name == 'manager' && $role->name == 'admin')
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endunless
                    @endforeach
                </select>
                @error('password_confirmation')
                <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                @enderror
            </div>
            <a href="/admin/users"><button type="button" class="btn btn-secondary">Naspäť na zoznam</button></a>
            <button type="submit" class="btn btn-success">Pridať</button>
        </form>
    </div>
@endsection

