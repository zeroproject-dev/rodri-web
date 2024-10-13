<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctoresRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Http\Request;

class DoctoresController extends Controller
{
    public function index()
    {
        return view('doctores.index', [
            'doctores' => User::latest(column: 'id')->paginate(perPage: 5),
        ]);
    }

    public function create()
    {
        return view('doctores.create', [
            'doctor' => new User(),
            'method' => 'POST',
            'action_url' => route('doctores.store'),
            'submit_button_text' => 'Crear doctor',
        ]);
    }

    public function store(DoctoresRequest $request)
    {
        User::create($request->validated());
        return redirect('doctores');
    }

    public function edit(User $user): View
    {
        return view(view: 'doctores.edit', data: [
            'doctor' => $user,
            'method' => 'PUT',
            'action_url' => route('doctores.update', $user),
            'submit_button_text' => 'Actualizar doctor'
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $user->update($request->validate([
            'email' => ['required', 'email', 'max:100'],
            'user' => ['required', 'max:100'],
            'primer_nombre' => ['required', 'max:100'],
            'segundo_nombre' => ['max:100'],
            'paterno' => ['required', 'max:100'],
            'materno' => ['max:100'],
            'especialidad' => ['max:100'],
            'fecha_nacimiento' => ['date'],
            'genero' => ['required', 'in:masculino,femenino'],
            'numero' => ['max:15'],
            'password' => ['required'],
]));
        return redirect()->route('doctores.index');
    }
}
