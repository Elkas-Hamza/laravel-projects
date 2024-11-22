@extends('layout')

@section('title', 'Modifier l\'Équipe')

@section('content')
<div class="container">
    <h1>Modifier l'Équipe</h1>

    <form action="{{ route('teams.update', $team['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom de l'Équipe</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $team['name']) }}" required>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="country">Pays</label>
            <input type="text" id="country" name="country" class="form-control" value="{{ old('country', $team['country']) }}" required>
            @error('country')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="photo">Photo (URL)</label>
            <input type="url" id="photo" name="photo" class="form-control" value="{{ old('photo', $team['photo']) }}">
            @error('photo')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour l'Équipe</button>
    </form>

    <a href="{{ route('teams.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
