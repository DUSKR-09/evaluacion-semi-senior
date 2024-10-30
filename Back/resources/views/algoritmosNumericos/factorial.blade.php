<!DOCTYPE html>
<html>
<head>
    <title>Factorial</title>
</head>
<body>
<h1>Calcular el factorial de un número</h1>

<form method="post" action="{{ url('/factorial') }}">
    @csrf <!-- Protección contra CSRF -->
    <label for="num">Introduzca el número:</label>
    <input type="number" name="num" required>
    <button type="submit">Calcular</button>
</form>

@if (isset($result))
    <p>El factorial de {{ $num }} es {{ $result }}.</p>
@endif

</body>
</html>
