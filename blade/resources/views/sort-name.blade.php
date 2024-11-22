<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tri des noms</title>
</head>
<body>
    <h1>Noms triés</h1>

    <ul>
        @foreach ($sortedNames as $name)
            <li>{{ $name }}</li>
        @endforeach
    </ul>
</body>
</html>