<!DOCTYPE html>
<html>
<head>
    <title>World Time</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>World Time</h1>
    <form action="{{ route('get-time') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="location">Digite o nome da cidade ou país:</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <button type="submit" class="btn btn-primary">Verificar Hora</button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif

    @if(isset($data))
        <div class="mt-3">
            <h2>Informações de Tempo</h2>
            <p>Local: {{ $data['zoneName'] }}</p>
            <p>Data e Hora: {{ \Carbon\Carbon::createFromTimestamp($data['timestamp'])->toDateTimeString() }}</p>
        </div>
    @endif
</div>
</body>
</html>
