<?php

use App\Http\Controllers\AmortizationController;
use App\Http\Controllers\BinomioController;
use App\Http\Controllers\FactorialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//rutas para factorial
Route::get('/factorial', [FactorialController::class, 'show']);
Route::post('/factorial', [FactorialController::class, 'calculate']);

//rutas para amortizacion
Route::get('/amortizacion', [AmortizationController::class, 'show']);
Route::post('/amortizacion', [AmortizationController::class, 'calculate']);

//rutas para binomio
Route::get('/binomio', [BinomioController::class, 'show'])->name('binomio.show');
Route::post('/binomio/calculate', [BinomioController::class, 'calculate'])->name('binomio.calculate');
