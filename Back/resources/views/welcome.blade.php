<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla de Inicio</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Pantalla de Inicio</h1>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('factorial.show') }}" class="block text-center py-2 px-4 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
                    Cálculo de Factorial
                </a>
            </li>
            <li>
                <a href="{{ route('amortizacion.show') }}" class="block text-center py-2 px-4 bg-green-500 text-white font-semibold rounded hover:bg-green-600">
                    Amortización
                </a>
            </li>
            <li>
                <a href="{{ route('binomio.show') }}" class="block text-center py-2 px-4 bg-yellow-500 text-white font-semibold rounded hover:bg-yellow-600">
                    Cálculo de Binomio
                </a>
            </li>
        </ul>
    </div>
</body>
</html>
