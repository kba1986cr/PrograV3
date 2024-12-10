<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Puesto;
use App\Models\Horario;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    // Mostrar formulario para crear un nuevo horario
    public function create()
    {
        // Obtener todos los horarios para mostrar en el formulario si es necesario
        $horarios = Horario::all();
        return view('post.horarioPost.registrarHorarios', compact('horarios'));
    }

    // Almacenar un nuevo horario
    public function store(Request $request)
    {
        $request->validate([
            'nombre_horario' => 'required|string|max:255',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',  // Validación para hora de salida
        ]);

        // Crear el horario
        Horario::create([
            'nombre' => $request->input('nombre_horario'),
            'hora_inicio' => $request->input('hora_inicio'),
            'hora_fin' => $request->input('hora_fin'),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('horarios.create')->with('success', 'Horario creado exitosamente.');
    }

    // Actualizar un horario existente
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'nombre_horario' => 'required|string|max:255',
            'hora_inicio' => 'required|date_format:H:i',  // Validación para hora de entrada
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',  // Validación para hora de salida
        ]);

        try {
            // Buscar el horario por su ID
            $horario = Horario::findOrFail($id);

            // Actualizar el horario con los nuevos datos
            $horario->update([
                'nombre' => $request->input('nombre_horario'),
                'hora_inicio' => $request->input('hora_inicio'),
                'hora_fin' => $request->input('hora_fin'),
            ]);

            // Retornar una respuesta JSON indicando éxito
            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Manejo de errores
            return response()->json(['error' => 'Error al actualizar el horario: ' . $e->getMessage()]);
        }
    }

    // Eliminar un horario
    public function destroy($id)
    {
        try {
            // Buscar el horario por su ID
            $horario = Horario::findOrFail($id);

            // Eliminar el horario
            $horario->delete();

            // Retornar una respuesta JSON indicando éxito
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Manejo de errores
            return response()->json(['error' => 'Error al eliminar el horario: ' . $e->getMessage()]);
        }
    }
}
