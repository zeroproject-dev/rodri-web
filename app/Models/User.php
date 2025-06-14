<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'user',
        'paterno',
        'materno',
        'especialidad',
        'fecha_nacimiento',
        'genero',
        'numero',
        'estado',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'datetime',
            'email_verified_at' => 'datetime',
            'estado' => 'boolean',
            'password' => 'hashed',
        ];
    }

    public function pacientes(): HasMany
    {
        return $this->hasMany(Paciente::class);
    }

    public function sesiones(): HasMany
    {
        return $this->hasMany(Sesiones::class);
    }
}
