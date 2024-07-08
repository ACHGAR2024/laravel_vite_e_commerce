<!-- resources/views/avis/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container bg-slate-200 text-gray-950">
        <h1>Ajouter un Avis pour {{ $produit->name }}</h1>
        <form action="{{ route('avis.store', $produit->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" id="commentaire" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="note">Note</label>
                <select name="note" id="note" class="form-control" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter Avis</button>
        </form>
    </div>
@endsection
