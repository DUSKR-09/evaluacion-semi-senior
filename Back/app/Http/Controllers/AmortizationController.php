<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmortizationController extends Controller
{
    public function show()
    {
        return view('algoritmosNumericos.amortizacion'); // Retorna la vista
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|min:0',
            'tasa' => 'required|numeric|min:0',
            'periodo' => 'required|integer|min:1',
        ]);

        $cap = $request->input('monto');
        $tas = $request->input('tasa');
        $per = $request->input('periodo');

        $tasaint = ($tas) / 100;
        $amortizacion = $cap == 0 ? 0 : (float)($cap / $per);

        $data = [];

        $capital = (float)$cap;
        for ($i = 1; $i <= $per; $i++) {
            $saldo = $capital;
            $int = ($capital * $tasaint);
            $abono = $amortizacion;
            $pago = ($amortizacion + $int);
            $saldofin = ($saldo - $abono);
            $capital = $saldofin;

            $data[] = [
                'periodo' => $i,
                'saldo' => number_format($saldo, 2, ".", ","),
                'interes' => number_format($int, 2, ".", ","),
                'abono' => number_format($abono, 2, ".", ","),
                'pago' => number_format($pago, 2, ".", ","),
            ];
        }

        return view('algoritmosNumericos.amortizacion', compact('data', 'cap', 'tas', 'per')); // Retorna la vista con los resultados
    }
}
