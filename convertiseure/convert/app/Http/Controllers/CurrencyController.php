<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $rates = [
            'USD' => 10.3,
            'EUR' => 10.9,
            'GBP' => 12.5,
            'CAD' => 7.6
        ];

        return view('converter', compact('rates'));
    }

    public function convert(Request $request)
    {
        $rates = [
            'USD' => 10.3,
            'EUR' => 10.9,
            'GBP' => 12.5,
            'CAD' => 7.6
        ];

        $amount = $request->amount;
        $currency = $request->currency;
        $result = $amount * $rates[$currency];

        return view('converter', [
            'rates' => $rates,
            'amount' => $amount,
            'currency' => $currency,
            'result' => $result
        ]);
    }
}
