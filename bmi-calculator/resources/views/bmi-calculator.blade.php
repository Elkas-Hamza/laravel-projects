<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculateur d'IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Calculateur d'IMC</h1>
        <form method="POST" action="{{ route('calculate') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Genre</label>
                <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror" required>
                    <option value="">Sélectionner le genre</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Homme</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Femme</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="height" class="form-label">Taille (en cm)</label>
                <input type="number" name="height" id="height" class="form-control @error('height') is-invalid @enderror" required>
                @error('height')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Poids (en kg)</label>
                <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" required>
                @error('weight')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Calculer l'IMC</button>
        </form>

        @if(isset($bmi))
            <div class="alert alert-success mt-3">
                <strong>Bonjour {{ $name }},</strong> votre IMC est de <strong>{{ $bmi }}</strong>.
                Vous êtes classé comme <strong>{{ $category }}</strong>.
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
