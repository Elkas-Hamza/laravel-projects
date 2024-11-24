@extends('layout')

@section('title', 'Modifier le Joueur')

@section('content')
<div class="container">
    <h1>Modifier le Joueur</h1>

    <form action="{{ route('players.update', ['teamId' => $teamId, 'playerId' => $player['id']]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom du Joueur</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $player['name']) }}" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $player['position']) }}" required>
        </div>

        <div class="form-group">
            <label for="age">Âge</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $player['age']) }}" required min="18" max="40">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour le Joueur</button>
    </form>

    <a href="{{ route('teams.show', $teamId) }}" class="btn btn-secondary mt-3">Retour à l'Équipe</a>
</div>
@endsection
