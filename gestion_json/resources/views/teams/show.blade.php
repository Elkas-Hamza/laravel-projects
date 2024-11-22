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
            <div >
                <p><strong>ID:</strong> {{ $team['id'] }}</p>
                <p><strong>Pays:</strong> {{ $team['country'] }}</p>

            </div>
            <div>
                <img src="{{ $team['photo'] }}" alt="{{ $team['name'] }} logo" class="img-fluid" width="150">
            </div>
        </div>
    </div>

    <a href="{{ route('teams.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    <a href="{{ route('teams.edit', $team['id']) }}" class="btn btn-warning mt-3">Modifier</a>

    <form action="{{ route('teams.destroy', $team['id']) }}" method="POST" class="d-inline mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Supprimer</button>
    </form>
</div>
<style>
.card-body  {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 20px;
}
</style>
@endsection
