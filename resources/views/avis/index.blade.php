@extends('layouts.app')

@section('content')
    <div class="container bg-slate-200 text-gray-950">
        <h1>Avis</h1>
        <a href="{{ route('avis.create') }}" class="btn btn-primary">Ajouter Avis</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Produit</th>
                    <th>ID Utilisateur</th>
                    <th>Note</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($avis as $avis)
                    <tr>
                        <td>{{ $avis->product_id }}</td>
                        <td>{{ $avis->user_id }}</td>
                        <td>{{ $avis->rating }}</td>
                        <td>{{ $avis->comment }}</td>
                        <td>
                            <a href="{{ route('avis.show', $avis->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('avis.edit', $avis->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('avis.destroy', $avis->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
