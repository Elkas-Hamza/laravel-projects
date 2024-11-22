<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculer le PPCM et PGCD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4 text-center">Calculer le PPCM et PGCD</h1>
        <form action="{{ url('/') }}" method="POST" class="bg-light p-4 rounded shadow">
            @csrf
            <div class="mb-3">
                <label for="number1" class="form-label">Entier naturel 1 :</label>
                <input
                    type="number"
                    name="number1"
                    id="number1"
                    class="form-control"
                    value="{{ old('number1') }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="number2" class="form-label">Entier naturel 2 :</label>
                <input
                    type="number"
                    name="number2"
                    id="number2"
                    class="form-control"
                    value="{{ old('number2') }}"
                    required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Calculer</button>
            </div>
        </form>

        @if ($gcd !== null && $lcm !== null)
            <div class="mt-5 bg-success text-white p-4 rounded shadow">
                <h2 class="text-center">Résultats</h2>
                <p>Pour les nombres <strong>{{ $number1 }}</strong> et <strong>{{ $number2 }}</strong> :</p>
                <p><strong>PGCD :</strong> {{ $gcd }}</p>
                <p><strong>PPCM :</strong> {{ $lcm }}</p>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
