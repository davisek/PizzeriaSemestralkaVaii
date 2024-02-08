@extends('layout')

<x-nav />
@section('content')
<section id="favoritePizzas" class="pizzaMenu">
    <div class="container py-5 text-center" id="appFavorite">
        <h2 class="mb-5">Zoznam obľúbených pizz</h2>
        @if(session('success'))
            <div role='alert' class="alert alert-success in center">{{session('success')}}</div>
        @endif
        <div class="row d-flex justify-content-center">
            @foreach($favorites as $favorite)
            <x-favorite-card :favorite="$favorite" />
            @endforeach
            <div class="d-flex justify-content-center mb-5 mx-4">
                <button class="btn btn-warning" data-toggle="modal" data-target="#addFavoritePizza">+</button>
            </div>
        </div>

        <!-- Modal na pridanie -->
        <div class="modal fade" id="addFavoritePizza" tabindex="-1" role="dialog" aria-labelledby="addFavoriteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="addFavoriteModalLabel">Pridanie obľúbenej pizze</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../../phpController/phpController.php" method="post">
                        <div class="modal-body">
                            <select name="pizza" class="form-control" required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavrieť</button>
                            <input value="Pridať pizzu" name="add" type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
