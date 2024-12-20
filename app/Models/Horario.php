<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'hora_inicio', 'hora_fin'];

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}

