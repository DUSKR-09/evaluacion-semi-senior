<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
    @vite('resources/css/app.css') <!-- Asegúrate de que esta ruta es correcta para tu archivo de CSS de Tailwind -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen text-gray-800">
    <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-lg">
        <div class="flex justify-left mt-6">
            <a href="{{ route('home') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Volver a la página principal
            </a>
        </div>

        <h1 class="text-2xl font-bold mb-6 text-center">Calcular el factorial de un número</h1>

        <form method="post" action="{{ route('factorial.calculate') }}" class="space-y-4">
            @csrf
            <div>
                <label for="num" class="block text-sm font-medium text-gray-700">Introduzca el número:</label>
                <input type="number" name="num" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Calcular
            </button>
        </form>

        @if (isset($result))
            <p class="mt-4 text-center">El factorial de {{ $num }} es {{ $result }}.</p>
        @endif
    </div>
</body>
</html>
