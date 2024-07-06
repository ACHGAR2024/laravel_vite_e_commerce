@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Collections</h1>
        <a href="{{ route('collections.create') }}" class="btn btn-primary">Add Collection</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collections as $collection)
                    <tr>
                        <td>{{ $collection->name }}</td>
                        <td>{{ $collection->description }}</td>
                        <td>
                            <a href="{{ route('collections.show', $collection->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('collections.destroy', $collection->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
