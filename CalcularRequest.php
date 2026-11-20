<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalcularRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'num1' => ['required', 'numeric'],
            'num2' => ['required', 'numeric'],
            'operacion' => ['required', 'in:sumar,restar,multiplicar,dividir'],
        ];
    }

    public function messages(): array
    {
        return [
            'num1.required' => 'Ingrese el primer número.',
            'num2.required' => 'Ingrese el segundo número.',
            'operacion.in' => 'Seleccione una operación válida.',
        ];
    }
}
