<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estadistica extends Model
{
    use HasFactory;

    protected $fillable = [
        'sesion_id',
        'nombre',
        'valor',
    ];

    public function sesion(): BelongsTo
    {
        return $this->belongsTo(Sesiones::class, 'sesion_id');
    }
}
