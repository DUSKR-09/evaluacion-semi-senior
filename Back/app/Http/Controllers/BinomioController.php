<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BinomioController extends Controller
{
    public function show()
    {
        return view('algoritmosNumericos.binomio');
    }

    public function calculate(Request $request)
    {
        $n = $request->input('n');
        $expansion = $this->binomialExpansion('a', 'b', $n);

        return view('algoritmosNumericos.binomio', compact('expansion', 'n'));
    }

    private function binomialCoefficient($n, $k)
    {
        if ($k == 0 || $k == $n) {
            return 1;
        }
        return $this->binomialCoefficient($n - 1, $k - 1) + $this->binomialCoefficient($n - 1, $k);
    }

    private function binomialExpansion($a, $b, $n)
    {
        $result = [];
        for ($k = 0; $k <= $n; $k++) {
            $coefficient = $this->binomialCoefficient($n, $k);
            $term = '';

            // Agregar el coeficiente si es mayor que 1
            if ($coefficient > 1) {
                $term .= $coefficient;
            }

            // Agregar a^(n-k) si n-k > 0
            if ($n - $k > 0) {
                $term .= $a;
                if ($n - $k > 1) {
                    $term .= "^" . ($n - $k);
                }
            }

            // Agregar b^k si k > 0
            if ($k > 0) {
                $term .= $b;
                if ($k > 1) {
                    $term .= "^" . $k;
                }
            }

            // Añadir el término a la lista de resultados
            $result[] = $term;
        }

        return implode(' + ', $result);
    }

}
