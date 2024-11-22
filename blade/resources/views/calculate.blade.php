<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul PPCM et PGCD</title>
</head>
<body>
    <h1>Calcul du PPCM et du PGCD</h1>

    <!-- Formulaire -->
    <form action="/calculate" method="POST">
        @csrf
        <label for="number1">Entier 1 :</label>
        <input type="number" name="number1" id="number1" required>
        <br>
        <label for="number2">Entier 2 :</label>
        <input type="number" name="number2" id="number2" required>
        <br><br>
        <button type="submit">Calculer</button>
    </form>

    <!-- Résultats -->
    @isset($pgcd)
        <h2>Résultats :</h2>
        <p>PGCD de {{ $a }} et {{ $b }} : {{ $pgcd }}</p>
        <p>PPCM de {{ $a }} et {{ $b }} : {{ $ppcm }}</p>
    @endisset
</body>
</html>