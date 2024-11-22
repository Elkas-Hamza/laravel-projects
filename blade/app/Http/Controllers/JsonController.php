<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class JsonController extends Controller
{
    public function sortNames()
    {
        // Initialiser une collection JSON avec des noms
        $names = collect(['Salma', 'Ahmed', 'Zineb', 'Youssef', 'Amine']);

        // Trier la collection
        $sortedNames = $names->sort()->values();

        // Retourner à la vue avec la collection triée
        return view('sort-names', compact('sortedNames'));
    }
    public function showTeams()
{
    // Charger les équipes depuis le fichier JSON
    $teams = json_decode(file_get_contents(storage_path('app/teams.json')));

    // Retourner à la vue
    return view('teams', compact('teams'));
}
public function editTeam(Request $request)
{
    $teams = collect(json_decode(file_get_contents(storage_path('app/teams.json')), true));
    $team = $teams->where('id', $request->id)->first();

    if ($team) {
        $team['name'] = $request->name ?? $team['name'];
        $team['country'] = $request->country ?? $team['country'];

        // Mettre à jour les données
        $updatedTeams = $teams->map(function ($item) use ($team) {
            return $item['id'] === $team['id'] ? $team : $item;
        });
        file_put_contents(storage_path('app/teams.json'), $updatedTeams->toJson());
    }

    return redirect('/teams');
}

public function deleteTeam(Request $request)
{
    $teams = collect(json_decode(file_get_contents(storage_path('app/teams.json')), true));
    $updatedTeams = $teams->filter(fn($team) => $team['id'] !== $request->id);

    file_put_contents(storage_path('app/teams.json'), $updatedTeams->toJson());

    return redirect('/teams');
}
public function createTeam(Request $request) {
    $json = collect(json_decode(file_get_contents(storage_path('app/teams.json')), true));
    $teams = json_decode($json, true);

    $newTeam = [
        'id' => count($teams) + 1,
        'name' => $request->input('name'),
        'country' => $request->input('country')
    ];

    $teams[] = $newTeam;
    Storage::put('teams.json', json_encode($teams));
    return redirect('/teams');
}
}
