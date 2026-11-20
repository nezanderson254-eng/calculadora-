<?php
namespace App\Http\Controllers;

use App\Http\Requests\CalcularRequest;
use App\Models\Calculation;
use App\Services\CalculadoraService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CalculadoraController extends Controller
{
    public function __construct(private CalculadoraService $calculadora) {}

    public function index(): View
    {
        return view('calculadora.index', [
            'historial' => Calculation::latest()->take(10)->get()
        ]);
    }

    public function calcular(CalcularRequest $request): RedirectResponse
    {
        $datos = $request->validated();
        $resultado = $this->calculadora->calcular(
            (float) $datos['num1'],
            (float) $datos['num2'],
            $datos['operacion']
        );

        Calculation::create([
            ...$datos,
            'result' => $resultado
        ]);

        return back()->with('resultado', $resultado)
            ->with('mensaje', 'Operación realizada correctamente.');
    }
}
