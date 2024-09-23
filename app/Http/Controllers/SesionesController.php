<?php

namespace App\Http\Controllers;

use App\Http\Requests\SesionesRequest;
use App\Models\Sesiones;
use App\Models\Paciente;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SesionesController extends Controller
{
    public function index(): View
    {
        $sesiones = Sesiones::with('paciente')->latest(column: "id")->paginate(perPage: 5);

        return view(view: 'sesiones.index', data: compact(var_name: 'sesiones'));
    }

    public function create(): View
    {
        return view(view: 'sesiones.create', data: [
            'sesion' => new Sesiones(),
            'pacientes' => Paciente::all(),
            'method' => 'post',
            'action_url' => route('sesiones.store'),
            'submit_button_text' => 'Crear sesion'
        ]);
    }

    public function store(SesionesRequest $request): RedirectResponse
    {
        $request->user()->sesiones()->create($request->validated());
        return redirect('sesiones');
    }
}
