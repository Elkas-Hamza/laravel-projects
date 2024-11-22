<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du calcul de prêt</title>
    @extends('layouts.app')

    @section('content')
    <div class="mt-5">
        <h1>Résultat du calcul de prêt</h1>

        @php
            $color = 'text-success';
            if ($mensualite > 2000) {
                $color = 'text-danger';
            } elseif ($mensualite > 1000) {
                $color = 'text-warning';
            }
        @endphp

        <p>La mensualité calculée est : <span class="{{ $color }}">{{ number_format($mensualite, 2) }} dhs</span></p>
    </div>
    @endsection
</body>
</html>
