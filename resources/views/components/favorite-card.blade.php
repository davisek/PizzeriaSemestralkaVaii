@props(['favorite'])
<div class="card text-white bg-dark mx-4 mb-5" style="width: 18rem;">
    <form action="/favorites/{{$favorite->id}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" name="delete" class="btn btn-warning" value="Odstrániť">
    </form>
    <img class="card-img-top m-auto pt-3" src="{{asset('storage/' . $favorite->pizza->img)}}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$favorite->pizza->name}}</h5>
        <p class="card-text">{{$favorite->pizza->ingredients}}</p>
    </div>
</div>
