<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'puesto_id', 'horario_id', 'hora_inicio_extra', 'hora_fin_extra'];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    public function tiemposExtras()
    {
        return $this->hasMany(TiempoExtra::class);
    }
}

