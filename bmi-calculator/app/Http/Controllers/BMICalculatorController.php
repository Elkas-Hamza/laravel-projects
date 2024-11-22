<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMICalculatorController extends Controller
{
    public function index()
    {
        return view('bmi-calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
        ]);

        $height = $request->input('height');
        $weight = $request->input('weight');


        $bmi = $weight / (($height / 100) ** 2);


        $category = '';
        if ($bmi < 18.5) {
            $category = 'Maigre';
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $category = 'Poid idéal';
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $category = 'surpoids';
        } else {
            $category = 'Obésité';
        }

        return view('bmi-calculator', [
            'name' => $request->input('name'),
            'bmi' => round($bmi, 2),
            'category' => $category,
            'gender' => $request->input('gender'),
        ]);
    }
}
