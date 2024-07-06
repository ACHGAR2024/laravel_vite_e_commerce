@extends('layouts.app')

@section('content')
    <div class="container bg-slate-200 text-gray-950">
        <h1>Ajouter Avis</h1>
        <form action="{{ route('avis.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="user_id">Utilisateur</label>
                <input type="number" name="user_id" id="user_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="produit_id">Produit</label>
                <input type="number" name="produit_id" id="produit_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rating">Note</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5"
                    required>
            </div>
            <div class="form-group">
                <label for="comment">Commentaire</label>
                <textarea name="comment" id="comment" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
