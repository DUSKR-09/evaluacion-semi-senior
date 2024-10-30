<?php

use App\Http\Controllers\AmortizationController;
use App\Http\Controllers\BinomioController;
use App\Http\Controllers\FactorialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//rutas para factorial
Route::get('/factorial', [FactorialController::class, 'show'])->name('factorial.show');
Route::post('/factorial', [FactorialController::class, 'calculate'])->name('factorial.calculate');

//rutas para amortizacion
Route::get('/amortizacion', [AmortizationController::class, 'show'])->name('amortizacion.show');
Route::post('/amortizacion', [AmortizationController::class, 'calculate'])->name('amortizacion.calculate');

//rutas para binomio
Route::get('/binomio', [BinomioController::class, 'show'])->name('binomio.show');
Route::post('/binomio/calculate', [BinomioController::class, 'calculate'])->name('binomio.calculate');
