<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'correo',
        'primer_nombre',
        'segundo_nombre',
        'paterno',
        'materno',
        'fecha_nacimiento',
        'numero',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
            'estado' => 'boolean',
        ];
    }

    public function doctores(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
