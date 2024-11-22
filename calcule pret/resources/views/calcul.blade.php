<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Calcul de Prêt Bancaire</title>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="mt-5">
    <h1>Calcul de Prêt Bancaire</h1>
    <form action="{{ route('calculate.loan') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="m_pret" class="form-label">Montant du prêt</label>
            <input type="number" name="m_pret" id="m_pret" class="form-control" placeholder="Montant du prêt" required>
        </div>
        <div class="mb-3">
            <label for="taux" class="form-label">Taux d'intérêt annuel (%)</label>
            <input type="number" name="taux" id="taux" step="0.01" class="form-control" placeholder="Taux d'intérêt annuel" required>
        </div>
        <div class="mb-3">
            <label for="duree" class="form-label">Durée (en mois)</label>
            <input type="number" name="duree" id="duree" class="form-control" placeholder="Durée (en mois)" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculer</button>
    </form>
</div>
@endsection

</body>
</html>
