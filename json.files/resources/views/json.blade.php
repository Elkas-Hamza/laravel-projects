<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des personnes triées</title>
</head>
<body>
    <h1>Liste des personnes triées</h1>
    <ul>
        @foreach ($sortedPeople as $person)
            <li>{{ $person }}</li>
        @endforeach
    </ul>
</body>
</html>
