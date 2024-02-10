@extends('admin.layoutAdmin')
@section('titleAdmin', 'Uprav Pizzu')
@section('contentAdmin')
<div class="col-md-10" id="editPizza">
    <div class="ml-3">
        <h1>Zmeny pizze {{$pizza->name}}</h1>
    </div>
    <form action="/admin/update/pizza/{{$pizza->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name" class="mb-0">Meno pizze *</label>
                    <input type="text" name="name" class="form-control mb-2" value="{{$pizza->name}}">
                    @error('name')
                    <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ingredients" class="mb-0">Ingrediencie *</label>
                    <input type="text" name="ingredients" class="form-control mb-2" value="{{$pizza->ingredients}}">
                    @error('ingredients')
                    <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="weight" class="mb-0">Váha *</label>
                    <input type="number" name="weight" class="form-control mb-2" value="{{$pizza->weight}}" pattern="^\d*(\.\d{0,2})?$" min="0" step=".01">
                    @error('weight')
                    <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="mb-0">Cena *</label>
                    <input type="number" name="price" class="form-control mb-2" value="{{$pizza->price}}" pattern="^\d*(\.\d{0,2})?$" min="0" step=".01">
                    @error('price')
                    <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="form-group mt-3">
                    <label for="img">Vybrať obrázok na pridanie</label>
                    <input class="mb-0" type="file" name="img">
                    @error('img')
                    <div role='alert' class="alert alert-danger in center">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <p>Momentálny obrázok</p>
                    <img src="{{asset('storage/' . $pizza->img)}}" alt="pizza">
                </div>
            </div>
        </div>
        <div>
            <a href="/admin/pizzas"><button type="button" class="btn btn-secondary">Naspäť na zoznam</button></a>
            <button type="submit" class="btn btn-warning">Uložiť zmeny</button>
        </div>
    </form>
</div>
@endsection
