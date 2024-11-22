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

    public function index()
    {
        $teams = $this->readJsonFile();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

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
        ];

        $teams[] = $newTeam;
        $this->writeJsonFile($teams);

        return redirect()->route('teams.index')->with('success', 'Équipe ajoutée avec succès.');
    }

    public function show($id)
    {
        $teams = $this->readJsonFile();
        $team = collect($teams)->firstWhere('id', $id);

        if (!$team) {
            abort(404, 'Équipe non trouvée.');
        }

        return view('teams.show', compact('team'));
    }

    public function edit($id)
    {
        $teams = $this->readJsonFile();
        $team = collect($teams)->firstWhere('id', $id);

        if (!$team) {
            abort(404, 'Équipe non trouvée.');
        }

        return view('teams.edit', compact('team'));
    }

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
        ];

        $this->writeJsonFile($teams);

        return redirect()->route('teams.index')->with('success', 'Équipe mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $teams = $this->readJsonFile();
        $teams = array_filter($teams, function ($team) use ($id) {
            return $team['id'] != $id;
        });

        $this->writeJsonFile(array_values($teams));

        return redirect()->route('teams.index')->with('success', 'Équipe supprimée avec succès.');
    }

    private function readJsonFile()
    {
        if (!file_exists($this->jsonFilePath)) {
            return [];
        }

        $content = file_get_contents($this->jsonFilePath);
        return json_decode($content, true) ?? [];
    }

    private function writeJsonFile($data)
    {
        file_put_contents($this->jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
