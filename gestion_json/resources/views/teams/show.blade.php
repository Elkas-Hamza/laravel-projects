@extends('layout')

@section('title', 'Détails de l\'Équipe')

@section('content')
<div class="container">
    <h1>Détails de l'Équipe</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $team['name'] }}</h3>
        </div>
        <div class="card-body">
            <div>
                <p><strong>ID:</strong> {{ $team['id'] }}</p>
                <p><strong>Pays:</strong> {{ $team['country'] }}</p>
            </div>
            <div>
                <img src="{{ $team['photo'] }}" alt="{{ $team['name'] }} logo" class="img-fluid" width="150">
            </div>
        </div>
    </div>

    <!-- Players Table -->
    <h3 class="mt-4">Joueurs de l'Équipe</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Position</th>
                <th>Âge</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($team['players'] as $player)
                <tr>
                    <td>{{ $player['id'] }}</td>
                    <td>{{ $player['name'] }}</td>
                    <td>{{ $player['position'] }}</td>
                    <td>{{ $player['age'] }}</td>
                    <td>
                        <a href="{{ route('players.edit', ['teamId' => $team['id'], 'playerId' => $player['id']]) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('players.delete', ['teamId' => $team['id'], 'playerId' => $player['id']]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun joueur trouvé pour cette équipe.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Add Player Button -->
    <a href="{{ route('players.create', $team['id']) }}" class="btn btn-success mt-3">Ajouter un Joueur</a>



    <a href="{{ route('teams.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    <a href="{{ route('teams.edit', $team['id']) }}" class="btn btn-warning mt-3">Modifier</a>

    <form action="{{ route('teams.destroy', $team['id']) }}" method="POST" class="d-inline mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Supprimer</button>
    </form>
</div>

<style>
.card-body {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 20px;
}

table {
    width: 100%;
}

table th, table td {
    text-align: center;
}

table td {
    vertical-align: middle;
}
</style>

@endsection
