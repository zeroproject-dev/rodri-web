<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadisticaRequest;
use App\Models\Estadistica;
use App\Models\Paciente;
use App\Models\Sesiones;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class EstadisticasController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        // $estadisticas = Estadistica::with('sesion')->whereHas('sesion', function ($query) use ($userId) {
        //     $query->where('user_id', $userId);
        // })->get()
        //     ->groupBy(function ($item) {
        //         return $item->sesion->id;
        //     })
        //     ->toJson();

        $estadisticas = Sesiones::with('estadisticas')
            ->where('user_id', $userId)
            ->get()
            ->toJson();

        $userId = Auth::id();

        $pacientes = Paciente::all()->where('user_id', $userId);

        return view(view: 'estadisticas.index', data: [
            'estadisticas' => $estadisticas,
            'pacientes' => $pacientes,
            'pacientesJson' => $pacientes->toJson()
        ]);
    }

    public function storeAPI(EstadisticaRequest $request): JsonResponse
    {
        $estadistica = Estadistica::create($request->validated());
        return response()->json($estadistica, 201);
    }
}
