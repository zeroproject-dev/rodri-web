<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PacienteRequest extends FormRequest
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
            'correo' => ['required', 'email', 'max:100', Rule::unique('pacientes', 'correo')->ignore($this->paciente)],
            'primer_nombre' => ['required', 'max:100'],
            'segundo_nombre' => ['max:100'],
            'paterno' => ['required', 'max:100'],
            'materno' => ['max:100'],
            'fecha_nacimiento' => ['date'],
            'numero' => ['max:15'],
        ];
    }

    public function messages(): array
    {
        return [
            'correo.required' => 'El correo es requerido',
            'correo.email' => 'El correo debe ser un correo válido',
            'correo.max' => 'El correo debe tener máximo :max caracteres',
            'correo.unique' => 'El correo ya está registrado',
            'primer_nombre.required' => 'El primer nombre es requerido',
            'primer_nombre.max' => 'El primer nombre debe tener máximo :max caracteres',
            'segundo_nombre.max' => 'El segundo nombre debe tener máximo :max caracteres',
            'paterno.required' => 'El apellido paterno es requerido',
            'paterno.max' => 'El apellido paterno debe tener máximo :max caracteres',
            'materno.max' => 'El apellido materno debe tener máximo :max caracteres',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'numero.max' => 'El número de teléfono debe tener máximo :max caracteres',
        ];
    }
}
