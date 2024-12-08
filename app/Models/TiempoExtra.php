<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiempoExtra extends Model
{
    use HasFactory;

    protected $fillable = ['evento_id', 'hora_inicio', 'hora_fin'];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}

