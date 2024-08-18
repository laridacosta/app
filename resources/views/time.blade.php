<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Hora Atual na Capital</title>
</head>
<body>
    <h1>Hora Atual na Capital do País</h1>

    <form action="{{ route('getTime') }}" method="POST">
        @csrf
        <label for="country">Digite o nome de um país:</label>
        <input type="text" name="country" id="country" required>
        <button type="submit">Enviar</button>
    </form>

    @if (isset($time))
        <h2>A hora atual em {{ $country }} é {{ $time }}</h2>
    @elseif (isset($error))
        <h2>{{ $error }}</h2>
    @endif
</body>
</html>
