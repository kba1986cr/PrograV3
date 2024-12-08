<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Puesto;
use App\Models\Horario;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return view('eventos.index', [
            'eventos' => Evento::with('puesto', 'horario')->get(),
            'puestos' => Puesto::all(),
            'horarios' => Horario::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'puesto_id' => 'required|exists:puestos,id',
            'horario_id' => 'required|exists:horarios,id',
        ]);

        Evento::create($request->all());
        return redirect()->back()->with('success', 'Evento registrado exitosamente.');
    }
}

