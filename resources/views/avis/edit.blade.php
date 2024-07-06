@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier Avis</h1>
        <form action="{{ route('avis.update', $avis->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="rating">Note</label>
                <input type="number" name="rating" class="form-control" id="rating" value="{{ $avis->rating }}"
                    min="1" max="5" required>
            </div>
            <div class="form-group">
                <label for="comment">Commentaire</label>
                <textarea name="comment" class="form-control" id="comment">{{ $avis->comment }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
