<?php

namespace App\Http\Controllers;

use App\Models\Sesiones;
use Illuminate\Contracts\View\View;

class SesionesController extends Controller
{
    public function index(): View
    {
        $sesiones = Sesiones::with('pacientes')->latest(column: "id")->paginate(perPage: 5);

        return view(view: 'sesiones.index', data: compact(var_name: 'sesiones'));
    }

    public function create(): View
    {
        return view(view: 'sesiones.create');
    }
}
