<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PacienteController extends Controller
{
    public function index(): View
    {
        $pacientes = Paciente::with('doctores')->latest(column: "id")->paginate(perPage: 5);

        return view(view: 'pacientes.index', data: compact(var_name: 'pacientes'));
    }

    public function create(): View
    {
        return view(view: 'pacientes.create', data: [
            'paciente' => new Paciente(),
            'method' => 'POST',
            'action_url' => route('pacientes.store'),
            'submit_button_text' => 'Crear paciente'
        ]);
    }

    public function store(PacienteRequest $request): RedirectResponse
    {
        $request->user()->pacientes()->create($request->validated());

        return redirect('pacientes');
    }

    // public function show(Paciente $paciente): View
    // {
    //     return view(view: 'pacientes.show', data: compact(var_name: 'paciente'));
    // }

    public function edit(Paciente $paciente): View
    {
        // Gate::authorize('update', $paciente);

        return view(view: 'pacientes.edit', data: [
            'paciente' => $paciente,
            'method' => 'PUT',
            'action_url' => route('pacientes.update', $paciente),
            'submit_button_text' => 'Actualizar paciente'
        ]);
    }

    public function update(PacienteRequest $request, Paciente $paciente): RedirectResponse
    {
        // Gate::authorize('update', $paciente);
        $paciente->update($request->validated());
        return redirect()->route('pacientes.index');
    }

    public function toggle(Paciente $paciente): RedirectResponse
    {
        // Gate::authorize('update', $paciente);

        $paciente->update([
            'estado' => !$paciente->estado
        ]);

        return redirect()->route('pacientes.index');
    }
}
