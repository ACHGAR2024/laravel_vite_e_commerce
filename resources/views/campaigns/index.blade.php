@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Campagnes</h1>
        <a href="{{ route('campaigns.create') }}" class="btn btn-primary">Ajouter une nouvelle campagne</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->name }}</td>
                        <td>{{ $campaign->description }}</td>
                        <td>{{ $campaign->start_date }}</td>
                        <td>{{ $campaign->end_date }}</td>
                        <td>
                            <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette campagne ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
