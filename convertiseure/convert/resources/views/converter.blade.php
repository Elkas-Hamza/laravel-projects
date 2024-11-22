<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Currency Converter</title>
    <style>
        body {
            font-family: Arial;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Currency Converter</h1>
    <div class="container mt-5">

        <form method="POST">
            @csrf
        <input
            type="number"
            name="amount"
            placeholder="Enter amount"
            value="{{ $amount ?? '' }}"
            required
            >

        <select name="currency">
            @foreach($rates as $code => $rate)
                <option
                    value="{{ $code }}"
                    {{ isset($currency) && $currency == $code ? 'selected' : '' }}
                    >
                    {{ $code }}
                </option>
                @endforeach
            </select>

        <button type="submit">Convert</button>
    </form>

    @if(isset($result))
        <div>
            <h2>Result:</h2>
            <p>
                {{ $amount }} {{ $currency }} =
                {{ number_format($result, 2) }} Dirhams
            </p>
        </div>
    @endif
</div>
</body>
</html>
