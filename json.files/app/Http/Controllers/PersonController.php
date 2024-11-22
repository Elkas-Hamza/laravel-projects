<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $peopleJson = '["Alice", "Bob", "Charlie", "David", "Eve"]';

        $peopleArray = json_decode($peopleJson, true);

        $peopleCollection = collect($peopleArray);

        $sortedPeople = $peopleCollection->sort()->values();

        return view('json', compact('sortedPeople'));
    }
}
