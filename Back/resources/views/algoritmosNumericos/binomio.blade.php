<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expansión de Binomios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Expansión de Binomios (a + b)^n</h2>
    <form method="POST" action="{{ route('binomio.calculate') }}">
        @csrf
        <div class="col-sm-4">
            <label for="n">Introduce la potencia (n):</label>
            <input type="number" class="form-control" id="n" name="n" required>
        </div>
        <div class="col-sm-4 mt-2">
            <button class="btn btn-success" type="submit">Calcular</button>
        </div>
    </form>

    @if(isset($expansion))
        <h4 class="mt-4">La expansión de (a + b)^{{ $n }} es:</h4>
        <p>{{ $expansion }}</p>
    @endif
</div>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
