<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SesionesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'paciente_id' => ['required', 'exists:pacientes,id'],
            'fecha' => ['required', 'date'],
            'notas' => ['required', 'max:500'],
            'tipo' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'paciente_id.required' => 'El paciente es requerido',
            'paciente_id.exists' => 'El paciente no existe',
            'fecha.required' => 'La fecha es requerida',
            'fecha.date' => 'La fecha debe ser una fecha válida',
            'notas.required' => 'Las notas son requeridas',
            'notas.max' => 'Las notas deben tener máximo :max caracteres',
            'tipo.required' => 'El tipo de sesión es requerido',
        ];
    }
}
