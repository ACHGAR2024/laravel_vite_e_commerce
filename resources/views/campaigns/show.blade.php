@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de la campagne : {{ $campaign->name }}</h1>
        <ul>
            <li>Nom : {{ $campaign->name }}</li>
            <li>Description : {{ $campaign->description }}</li>
            <li>Date de début : {{ $campaign->start_date }}</li>
            <li>Date de fin : {{ $campaign->end_date }}</li>
        </ul>
        <a href="{{ route('campaigns.index') }}" class="btn btn-primary">Retour</a>
    </div>
@endsection
