@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $collection->name }}</h1>
        <p>{{ $collection->description }}</p>
        <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('collections.destroy', $collection->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
