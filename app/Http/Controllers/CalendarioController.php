<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Turno;

class CalendarioController extends Controller
{
    // Renderizar la vista del calendario con los turnos
    public function index()
    {
        $turnos = Turno::all();
        return view('loggin', ['turnos' => $turnos]);
    }

    // Guardar un nuevo turno
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'turno' => 'required|string',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i',
            'nota' => 'nullable|string',
        ]);

        Turno::create($request->all());

        return response()->json(['message' => 'Turno guardado exitosamente.']);
    }

    // Actualizar un turno existente
    public function update(Request $request, $id)
    {
        $turno = Turno::findOrFail($id);

        $request->validate([
            'fecha' => 'required|date',
            'turno' => 'required|string',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i',
            'nota' => 'nullable|string',
        ]);

        $turno->update($request->all());

        return response()->json(['message' => 'Turno actualizado exitosamente.']);
    }

    // Eliminar un turno
    public function destroy($id)
    {
        Turno::findOrFail($id)->delete();

        return response()->json(['message' => 'Turno eliminado exitosamente.']);
    }

    public function show($fecha)
    {
        // Buscar turnos por fecha
        $turno = Turno::where('fecha', $fecha)->first();

        if ($turno) {
            return response()->json([
                'success' => true,
                'turno' => $turno,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron turnos para esta fecha.',
            ]);
        }
    }
}
