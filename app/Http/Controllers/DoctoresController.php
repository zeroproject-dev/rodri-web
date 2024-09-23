<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctoresRequest;
use App\Models\User;

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
}
