<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amortizaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Tabla de Amortizaciones</h2>
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ url('/amortizacion') }}" method="POST">
                @csrf <!-- Protección contra CSRF -->
                <div class="col-sm-3">
                    <label for="monto">Monto:</label>
                    <input type="text" class="form-control" id="monto" name="monto" required>
                </div>
                <div class="col-sm-3">
                    <label for="tasa">Tasa Interés:</label>
                    <input type="text" class="form-control" id="tasa" name="tasa" required>
                </div>
                <div class="col-sm-3">
                    <label for="periodo">Período:</label>
                    <input type="text" class="form-control" id="periodo" name="periodo" required>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-success" type="submit">Generar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>Período</th>
                <th>Saldo</th>
                <th>Interés</th>
                <th>Abono</th>
                <th>Pago</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row['periodo'] }}</td>
                        <td>{{ $row['saldo'] }}</td>
                        <td>{{ $row['interes'] }}</td>
                        <td>{{ $row['abono'] }}</td>
                        <td>{{ $row['pago'] }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
