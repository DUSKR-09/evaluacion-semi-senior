<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactorialController extends Controller
{
    public function show()
    {
        return view('algoritmosNumericos.factorial');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'num' => 'required|integer|min:0',
        ]);

        $num = $request->input('num');
        $result = $this->factorial($num);

        return view('algoritmosNumericos.factorial', compact('result', 'num'));
    }

    private function factorial($n)
    {
        if ($n == 0 || $n == 1) {
            return 1;
        } else {
            return $n * $this->factorial($n - 1);
        }
    }
}
