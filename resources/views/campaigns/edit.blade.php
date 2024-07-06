@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la campagne : {{ $campaign->name }}</h1>
        <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $campaign->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $campaign->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="start_date">Date de début</label>
                <input type="date" class="form-control" id="start_date" name="start_date"
                    value="{{ $campaign->start_date }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">Date de fin</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $campaign->end_date }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
