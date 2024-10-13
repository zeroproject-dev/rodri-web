<?php

namespace App\Http\Controllers;

use App\Models\Sesiones;
use App\Models\Paciente;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SesionesController extends Controller
{
    public function index(): View
    {
        $userId = Auth::id();

        $sesiones = Sesiones::with('paciente')->where('user_id', $userId)->latest('id')->paginate(5);
        return view('sesiones.index', compact('sesiones'));
    }


    public function create(): View
    {
        $userId = Auth::id();

        $pacientes = Paciente::all()->where('user_id', $userId);

        return view('sesiones.create', [
            'sesion' => new Sesiones(),
            'pacientes' => $pacientes,
            'method' => 'POST',
            'action_url' => route('sesiones.store'),
            'submit_button_text' => 'Iniciar Sesión'
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'tipo' => 'nullable|string|max:255',
            'fecha' => 'required|date',
        ]);

        $sesion = Sesiones::create([
            'paciente_id' => $validated['paciente_id'],
            'user_id' => $request->user()->id,
            'fecha' => $validated['fecha'],
            'tipo' => $validated['tipo'],
            'hora_inicio' => now()->format('H:i:s'),
        ]);

        return response()->json(['session_id' => $sesion->id]);
    }


    public function edit(Sesiones $sesion): View
    {
        $userId = Auth::id();

        $pacientes = Paciente::all()->where('user_id', $userId);

        return view('sesiones.edit', [
            'sesion' => $sesion,
            'pacientes' => $pacientes,
            'method' => 'PUT',
            'action_url' => route('sesiones.update', $sesion),
            'submit_button_text' => 'Finalizar Sesión'
        ]);
    }


    public function update(Request $request, Sesiones $sesion): RedirectResponse
    {
        $validated = $request->validate([
            'notas' => 'nullable|string',
        ]);

        if (is_null($sesion->hora_inicio)) {
            return redirect()->back()->withErrors(['hora_inicio' => 'La hora de inicio no está registrada.']);
        }

        $horaFin = now();
        $horaInicio = Carbon::createFromTimeString($sesion->hora_inicio);
        $duracionSegundos = $horaInicio->diffInSeconds($horaFin);

        $datos = [
            'notas' => $validated['notas'],
            'sintomas' => $request->input('sintomas'),
            'hora_fin' => $horaFin->format('H:i:s'),
            'duracion_segundos' => $duracionSegundos,
        ];

        $sesion->update($datos);

        return redirect()->route('sesiones.index')->with('success', 'Sesión finalizada correctamente.');
    }
}
