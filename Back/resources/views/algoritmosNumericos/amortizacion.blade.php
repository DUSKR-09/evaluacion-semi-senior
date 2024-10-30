<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amortizaciones</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto mt-8 p-4 max-w-4xl bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Tabla de Amortizaciones</h2>

    <form action="{{ route('amortizacion.calculate') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="monto" class="block text-sm font-medium text-gray-700">Monto:</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="monto" name="monto" required>
            </div>
            <div>
                <label for="tasa" class="block text-sm font-medium text-gray-700">Tasa Interés:</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="tasa" name="tasa" required>
            </div>
            <div>
                <label for="periodo" class="block text-sm font-medium text-gray-700">Período:</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="periodo" name="periodo" required>
            </div>
        </div>
        <div class="flex justify-end">
            <button class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500" type="submit">
                Generar
            </button>
        </div>
    </form>

    <div class="mt-8 overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold">Período</th>
                    <th class="py-3 px-4 text-left font-semibold">Saldo</th>
                    <th class="py-3 px-4 text-left font-semibold">Interés</th>
                    <th class="py-3 px-4 text-left font-semibold">Abono</th>
                    <th class="py-3 px-4 text-left font-semibold">Pago</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @if(isset($data))
                    @foreach($data as $row)
                        <tr class="border-b border-gray-200">
                            <td class="py-2 px-4">{{ $row['periodo'] }}</td>
                            <td class="py-2 px-4">{{ $row['saldo'] }}</td>
                            <td class="py-2 px-4">{{ $row['interes'] }}</td>
                            <td class="py-2 px-4">{{ $row['abono'] }}</td>
                            <td class="py-2 px-4">{{ $row['pago'] }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
