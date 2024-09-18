<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PacienteController extends Controller
{
    public function index(): View
    {
        $pacientes = Paciente::query()->paginate(perPage: 5);

        return view(view: 'pacientes.index', data: compact(var_name: 'pacientes'));

    }

    public function create(): View
    {
        return view(view: 'pacientes.create');
    }
}
