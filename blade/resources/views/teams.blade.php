<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipes de foot</title>
</head>
<body>
    <h1>Équipes de Football</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Pays</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->country }}</td>
                    <td><form action="/teams/edit" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $team->id }}">
    <input type="text" name="name" placeholder="Nom" value="{{ $team->name }}">
    <input type="text" name="country" placeholder="Pays" value="{{ $team->country }}">
    <button type="submit">Modifier</button>
</form>
<form action="/teams/delete" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $team->id }}">
    <button type="submit">Supprimer</button>
</form></td>
                </tr>
    
            @endforeach
        </tbody>
    </table>
    <form action="/teams/create" method="POST">
    @csrf
    <label>Team Name:</label>
    <input type="text" name="name" required>
    <label>Country:</label>
    <input type="text" name="country" required>
    <button type="submit">Create Team</button>
</form>
</body>
</html>
