<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function calculate(Request $request)
    {
        $request->validate([
            'm_pret' => 'required|numeric|min:0',
            'taux' => 'required|numeric|min:0',
            'duree' => 'required|integer|min:1',
        ]);

        $m_pret = $request->m_pret;
        $taux = $request->taux / (100 * 12);
        $duree = $request->duree;

        $mensualite = ($m_pret * $taux) / (1 - pow(1 + $taux, -$duree));

        return view('resultat', ['mensualite' => $mensualite]);
    }
}