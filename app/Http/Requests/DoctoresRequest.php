<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctoresRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')->ignore($this->user)],
            'user' => ['required', 'max:100', Rule::unique('users', 'user')->ignore($this->user)],
            'primer_nombre' => ['required', 'max:100'],
            'segundo_nombre' => ['max:100'],
            'paterno' => ['required', 'max:100'],
            'materno' => ['max:100'],
            'especialidad' => ['max:100'],
            'fecha_nacimiento' => ['date'],
            'genero' => ['required', 'in:masculino,femenino'],
            'numero' => ['max:15'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El correo es requerido',
            'email.email' => 'El correo debe ser un correo válido',
            'email.max' => 'El correo debe tener máximo :max caracteres',
            'email.unique' => 'El correo ya está registrado',
            'user.required' => 'El usuario es requerido',
            'user.max' => 'El usuario debe tener máximo :max caracteres',
            'user.unique' => 'El usuario ya está registrado',
            'primer_nombre.required' => 'El primer nombre es requerido',
            'primer_nombre.max' => 'El primer nombre debe tener máximo :max caracteres',
            'segundo_nombre.max' => 'El segundo nombre debe tener máximo :max caracteres',
            'paterno.required' => 'El apellido paterno es requerido',
            'paterno.max' => 'El apellido paterno debe tener máximo :max caracteres',
            'materno.max' => 'El apellido materno debe tener máximo :max caracteres',
            'especialidad.max' => 'La especialidad debe tener máximo :max caracteres',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'genero.required' => 'El género es requerido',
            'genero.in' => 'El género debe ser masculino o femenino',
            'numero.max' => 'El número de teléfono debe tener máximo :max caracteres',
            'password.required' => 'La contraseña es requerida',
        ];
    }
}
