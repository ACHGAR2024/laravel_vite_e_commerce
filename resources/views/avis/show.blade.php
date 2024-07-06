@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Avis pour le produit ID: {{ $avis->product_id }}</h1>
        <p>ID Utilisateur: {{ $avis->user_id }}</p>
        <p>Note: {{ $avis->rating }}</p>
        <p>Commentaire: {{ $avis->comment }}</p>
        <a href="{{ route('avis.edit', $avis->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('avis.destroy', $avis->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
@endsection
