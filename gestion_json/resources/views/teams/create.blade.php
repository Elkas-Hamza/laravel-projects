@extends('layout')

@section('title', 'Ajouter une Équipe')

@section('content')
<div class="container">
    <h1>Ajouter une Nouvelle Équipe</h1>

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nom de l'Équipe</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="country">Pays</label>
            <input type="text" id="country" name="country" class="form-control" value="{{ old('country') }}" required>
            @error('country')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="photo">Photo (URL)</label>
            <input type="url" id="photo" name="photo" class="form-control" value="{{ old('photo') }}">
            @error('photo')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ajouter l'Équipe</button>
    </form>

    <a href="{{ route('teams.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
