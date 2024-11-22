<!DOCTYPE html>
<html>
<head>
    <title>Résultats</title>
</head>
<body>
    <h1>Résultats</h1>
    <p>Pour les nombres {{ $number1 }} et {{ $number2 }} :</p>
    <p>PGCD : {{ $gcd }}</p>
    <p>PPCM : {{ $lcm }}</p>
    <a href="{{ url('/math') }}">Faire un autre calcul</a>
</body>
</html>
