<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesiones extends Model
{
    use HasFactory;

    protected $table = 'sesiones';
    protected $primaryKey = 'id';

    protected $fillable = [
        'paciente_id',
        'user_id',
        'fecha',
        'tipo',
        'notas',
    ];

    public function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
