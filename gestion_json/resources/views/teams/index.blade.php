@extends('layout')

@section('title', 'Liste des Équipes')

@section('content')
<div class="container">
    <h1 class="mt-5">Liste des Équipes de Football</h1>
    <a href="{{ route('teams.create') }}" class="btn btn-success mb-3">Ajouter une Équipe</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Pays</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team['id'] }}</td>
                    <td>{{ $team['name'] }}</td>
                    <td>{{ $team['country'] }}</td>
                    <td>
                        <a href="{{ route('teams.show', $team['id']) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('teams.edit', $team['id']) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('teams.destroy', $team['id']) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
