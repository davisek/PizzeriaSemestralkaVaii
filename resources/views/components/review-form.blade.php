<div class="mb-5">
    <form method="POST" action="/addReview">
        @csrf
        <label for="reviewAdd" class="text-white">Tu napíšte recenziu...</label>
        <textarea id="reviewAdd" name="review" class="reviewInput mb-2" rows="4">
        </textarea>
        @error('review')
        <div id='alert'>
            <div role='alert' class="'alert alert-danger in center'"> {{$message}} </div>
        </div>
        @enderror
        <button type="submit" class="btn btn-warning reviewButton">
            Pridaj recenziu
        </button>
    </form>
</div>
