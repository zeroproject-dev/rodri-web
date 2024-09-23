<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'primer_nombre' => ['required', 'string', 'max:255'],
            'segundo_nombre' => ['string', 'max:255'],
            'paterno' => ['required', 'string', 'max:255'],
            'materno' => ['string', 'max:255'],
            'especialidad' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'genero' => ['required', 'enum:masculino,femenino'],
            'numero' => ['required', 'string', 'max:255'],
            'user' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'email' => $request->email,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'especialidad' => $request->especialidad,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'numero' => $request->numero,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('pacientes.index', absolute: false));
    }
}
