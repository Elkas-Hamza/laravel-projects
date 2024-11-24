@extends('layout')

@section('content')
    <div class="container">
        <h2>Ajouter un joueur à l'équipe : {{ $team['name'] }}</h2>

        <form action="{{ route('players.add', $team['id']) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom du joueur</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="position">Poste</label>
                <input type="text" name="position" id="position" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="age">Âge</label>
                <input type="number" name="age" id="age" class="form-control" required min="18" max="40">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Joueur</button>
        </form>
    </div>
@endsection
