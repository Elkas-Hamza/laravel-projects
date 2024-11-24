<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    private $jsonFilePath;

    public function __construct()
    {
        $this->jsonFilePath = storage_path('teams.json');
    }

    // Display the list of all teams
    public function index()
    {
        $teams = $this->readJsonFile();
        return view('teams.index', compact('teams'));
    }

    // Show the form to create a new team
    public function create()
    {
        return view('teams.create');
    }

    // Store the new team data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'photo' => 'nullable|url',
        ]);

        $teams = $this->readJsonFile();
        $newTeam = [
            'id' => count($teams) > 0 ? end($teams)['id'] + 1 : 1,
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'photo' => $request->input('photo') ?? '',
            'players' => [], // Initialize players array
        ];

        $teams[] = $newTeam;
        $this->writeJsonFile($teams);

        return redirect()->route('teams.index')->with('success', 'Équipe ajoutée avec succès.');
    }

    // Show the details of a specific team
    public function show($id)
    {
        $teams = $this->readJsonFile();
        $team = collect($teams)->firstWhere('id', $id);

        if (!$team) {
            abort(404, 'Équipe non trouvée.');
        }

        return view('teams.show', compact('team'));
    }

    // Show the form to edit a specific team
    public function edit($id)
    {
        $teams = $this->readJsonFile();
        $team = collect($teams)->firstWhere('id', $id);

        if (!$team) {
            abort(404, 'Équipe non trouvée.');
        }

        return view('teams.edit', compact('team'));
    }

    // Update the specific team data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'photo' => 'nullable|url',
        ]);

        $teams = $this->readJsonFile();
        $teamIndex = collect($teams)->search(function ($team) use ($id) {
            return $team['id'] == $id;
        });

        if ($teamIndex === false) {
            abort(404, 'Équipe non trouvée.');
        }

        $teams[$teamIndex] = [
            'id' => $id,
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'photo' => $request->input('photo') ?? $teams[$teamIndex]['photo'],
            'players' => $teams[$teamIndex]['players'], // Keep players unchanged
        ];

        $this->writeJsonFile($teams);

        return redirect()->route('teams.index')->with('success', 'Équipe mise à jour avec succès.');
    }

    // Delete a specific team
    public function destroy($id)
    {
        $teams = $this->readJsonFile();
        $teams = array_filter($teams, function ($team) use ($id) {
            return $team['id'] != $id;
        });

        $this->writeJsonFile(array_values($teams));

        return redirect()->route('teams.index')->with('success', 'Équipe supprimée avec succès.');
    }

    // Show the form to add a player to a team
    public function createPlayer($teamId)
    {
        $teams = $this->readJsonFile();
        $team = collect($teams)->firstWhere('id', $teamId);

        if (!$team) {
            abort(404, 'Équipe non trouvée.');
        }

        return view('players.create', compact('team'));
    }

    // Handle adding a player to the team
    public function addPlayer(Request $request, $teamId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:40',
        ]);

        $teams = $this->readJsonFile();
        $teamIndex = collect($teams)->search(function ($team) use ($teamId) {
            return $team['id'] == $teamId;
        });

        if ($teamIndex === false) {
            abort(404, 'Équipe non trouvée.');
        }

        $newPlayer = [
            'id' => count($teams[$teamIndex]['players']) > 0 ? end($teams[$teamIndex]['players'])['id'] + 1 : 1,
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'age' => $request->input('age'),
        ];

        $teams[$teamIndex]['players'][] = $newPlayer;
        $this->writeJsonFile($teams);

        return redirect()->route('teams.show', $teamId)->with('success', 'Joueur ajouté avec succès.');
    }

    // Show the form to edit a specific player's details
    public function editPlayer($teamId, $playerId)
    {
        $teams = $this->readJsonFile();
        $teamIndex = collect($teams)->search(function ($team) use ($teamId) {
            return $team['id'] == $teamId;
        });

        if ($teamIndex === false) {
            abort(404, 'Équipe non trouvée.');
        }

        $player = collect($teams[$teamIndex]['players'])->firstWhere('id', $playerId);

        if (!$player) {
            abort(404, 'Joueur non trouvé.');
        }

        return view('players.edit', compact('team', 'player'));
    }

    // Update the player's details
    public function updatePlayer(Request $request, $teamId, $playerId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:40',
        ]);

        $teams = $this->readJsonFile();
        $teamIndex = collect($teams)->search(function ($team) use ($teamId) {
            return $team['id'] == $teamId;
        });

        if ($teamIndex === false) {
            abort(404, 'Équipe non trouvée.');
        }

        $playerIndex = collect($teams[$teamIndex]['players'])->search(function ($player) use ($playerId) {
            return $player['id'] == $playerId;
        });

        if ($playerIndex === false) {
            abort(404, 'Joueur non trouvé.');
        }

        $teams[$teamIndex]['players'][$playerIndex] = [
            'id' => $playerId,
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'age' => $request->input('age'),
        ];

        $this->writeJsonFile($teams);

        return redirect()->route('teams.show', $teamId)->with('success', 'Joueur mis à jour avec succès.');
    }

    // Delete a player from a team
    public function deletePlayer($teamId, $playerId)
    {
        $teams = $this->readJsonFile();
        $teamIndex = collect($teams)->search(function ($team) use ($teamId) {
            return $team['id'] == $teamId;
        });

        if ($teamIndex === false) {
            abort(404, 'Équipe non trouvée.');
        }

        $teams[$teamIndex]['players'] = array_filter($teams[$teamIndex]['players'], function ($player) use ($playerId) {
            return $player['id'] != $playerId;
        });

        $this->writeJsonFile($teams);

        return redirect()->route('teams.show', $teamId)->with('success', 'Joueur supprimé avec succès.');
    }

    // Method to read data from the JSON file
    private function readJsonFile()
    {
        if (!file_exists($this->jsonFilePath)) {
            return [];
        }

        $content = file_get_contents($this->jsonFilePath);
        return json_decode($content, true) ?? [];
    }

    // Method to write data to the JSON file
    private function writeJsonFile($data)
    {
        file_put_contents($this->jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
