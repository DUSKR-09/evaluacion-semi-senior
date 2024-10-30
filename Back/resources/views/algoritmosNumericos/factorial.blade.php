<!DOCTYPE html>
<html>
<head>
    <title>Factorial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<h1>Calcular el factorial de un número</h1>

<form method="post" action="{{ url('/factorial') }}">
    @csrf
    <label for="num">Introduzca el número:</label>
    <input type="number" name="num" required>
    <button type="submit">Calcular</button>
</form>

@if (isset($result))
    <p>El factorial de {{ $num }} es {{ $result }}.</p>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
