<?php
use App\Http\Controllers\CalculadoraController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CalculadoraController::class, 'index'])->name('calculadora.index');
Route::post('/calcular', [CalculadoraController::class, 'calcular'])->name('calculadora.calcular');
// Las rutas web usan sesión y protección CSRF automáticamente.
