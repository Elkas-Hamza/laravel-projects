<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class MathController extends Controller
{
    // Affiche le formulaire
    public function showForm()
    {
        return view('calculate'); // Nom de la vue Blade
    }

    // Traite le calcul du PGCD et du PPCM
    public function calculate(Request $request)
    {
        // Validation des entrées
        $validated = $request->validate([
            'number1' => 'required|integer|min:0',
            'number2' => 'required|integer|min:0',
        ]);

        $a = $validated['number1'];
        $b = $validated['number2'];

        // Calcul du PGCD
        $pgcd = $this->pgcd($a, $b);

        // Calcul du PPCM
        $ppcm = ($a * $b) / $pgcd;

        // Retourner à la vue avec les résultats
        return view('calculate', compact('a', 'b', 'pgcd', 'ppcm'));
    }

    // Fonction pour calculer le PGCD
    private function pgcd($a, $b)
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }
}