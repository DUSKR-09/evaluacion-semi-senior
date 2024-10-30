<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expansión de Binomios</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen text-gray-800">
    <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Expansión de Binomios (a + b)^n</h2>
        
        <form method="POST" action="{{ route('binomio.calculate') }}" class="space-y-4">
            @csrf
            <div>
                <label for="n" class="block text-sm font-medium text-gray-700">Introduce la potencia (n):</label>
                <input type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="n" name="n" required>
            </div>
            <div>
                <button class="px-4 py-2 w-full bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500" type="submit">
                    Calcular
                </button>
            </div>
        </form>

        @if(isset($expansion))
            <div class="mt-8 text-center">
                <h4 class="text-lg font-semibold">La expansión de (a + b)^{{ $n }} es:</h4>
                <p class="mt-2 text-gray-700">{{ $expansion }}</p>
            </div>
        @endif
    </div>
</body>
</html>
