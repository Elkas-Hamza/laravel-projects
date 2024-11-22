<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{
    public function index(Request $request)
    {
        $gcd = null;
        $lcm = null;
        $number1 = null;
        $number2 = null;

        if ($request->isMethod('post')) {
            $request->validate([
                'number1' => 'required|integer|min:0',
                'number2' => 'required|integer|min:0',
            ]);

            $number1 = $request->input('number1');
            $number2 = $request->input('number2');

            $gcd = $this->gcd($number1, $number2);
            $lcm = $this->lcm($number1, $number2, $gcd);
        }

        return view('ppcm', compact('gcd', 'lcm', 'number1', 'number2'));
    }

    private function gcd($a, $b)
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    private function lcm($a, $b, $gcd)
    {
        return ($a * $b) / $gcd;
    }
}
