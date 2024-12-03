<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Turno;
use Illuminate\Mail\Mailables\Content;

// class PostController extends Controller
// {
//     public function index()
//     {
//         return view('loggin');
//     }

//     public function gestionarTurno(Request $request)
//     {
//         $validated = $request->validate([
//             'dia' => 'required|date',
//             'turno' => 'required|string',
//             'hora_inicio' => 'nullable|date_format:H:i',
//             'hora_fin' => 'nullable|date_format:H:i',
//             'nota' => 'nullable|string',
//             'accion' => 'required|in:guardar,actualizar,eliminar',
//         ]);

//         $accion = $validated['accion'];

//         switch ($accion) {
//             case 'guardar':
//                 DB::table('turnos')->insert([
//                     'dia' => $validated['dia'],
//                     'turno' => $validated['turno'],
//                     'hora_inicio' => $validated['hora_inicio'],
//                     'hora_fin' => $validated['hora_fin'],
//                     'nota' => $validated['nota'],
//                 ]);
//                 return response()->json(['message' => 'Turno guardado exitosamente.']);
//             case 'actualizar':
//                 DB::table('turnos')
//                     ->where('dia', $validated['dia'])
//                     ->where('turno', $validated['turno'])
//                     ->update([
//                         'hora_inicio' => $validated['hora_inicio'],
//                         'hora_fin' => $validated['hora_fin'],
//                         'nota' => $validated['nota'],
//                     ]);
//                 return response()->json(['message' => 'Turno actualizado exitosamente.']);
//             case 'eliminar':
//                 DB::table('turnos')
//                     ->where('dia', $validated['dia'])
//                     ->where('turno', $validated['turno'])
//                     ->delete();
//                 return response()->json(['message' => 'Turno eliminado exitosamente.']);
//             default:
//                 return response()->json(['message' => 'Acción no válida.'], 400);
//         }
//     }
    
// }

class PostController extends Controller
{
    /**
     * Renderiza la vista principal del calendario.
     */
    public function index()
    {
        return view('loggin'); // Asegúrate de que esta vista existe.
    }
    
    /**
     * Maneja las acciones de guardar, actualizar o eliminar un turno.
     */
    public function gestionarTurno(Request $request)
    {
        // Valida los datos enviados desde el frontend.
        $validated = $request->validate([
            'dia' => 'required|date', // Fecha del turno.
            'turno' => 'required|string', // Tipo de turno.
            'hora_inicio' => 'nullable|date_format:H:i', // Hora de inicio.
            'hora_fin' => 'nullable|date_format:H:i', // Hora de fin.
            'nota' => 'nullable|string|max:255', // Nota opcional.
            'accion' => 'required|in:guardar,actualizar,eliminar', // Acción: guardar, actualizar, eliminar.
        ], [
            // Mensajes personalizados de error.
            'dia.required' => 'El campo "día" es obligatorio.',
            'turno.required' => 'El campo "turno" es obligatorio.',
            'accion.required' => 'La acción es obligatoria.',
            'accion.in' => 'La acción debe ser guardar, actualizar o eliminar.',
        ]);

        // Obtiene la acción solicitada.
        $accion = $validated['accion'];

        try {
            // Ejecuta la acción correspondiente.
            switch ($accion) {
                case 'guardar':
                    DB::table('turnos')->insert([
                        'dia' => $validated['dia'],
                        'turno' => $validated['turno'],
                        'hora_inicio' => $validated['hora_inicio'],
                        'hora_fin' => $validated['hora_fin'],
                        'nota' => $validated['nota'],
                    ]);
                    return response()->json(['message' => 'Turno guardado exitosamente.']);
                case 'actualizar':
                    DB::table('turnos')
                        ->where('dia', $validated['dia'])
                        ->where('turno', $validated['turno'])
                        ->update([
                            'hora_inicio' => $validated['hora_inicio'],
                            'hora_fin' => $validated['hora_fin'],
                            'nota' => $validated['nota'],
                        ]);
                    return response()->json(['message' => 'Turno actualizado exitosamente.']);
                case 'eliminar':
                    DB::table('turnos')
                        ->where('dia', $validated['dia'])
                        ->where('turno', $validated['turno'])
                        ->delete();
                    return response()->json(['message' => 'Turno eliminado exitosamente.']);
                default:
                    return response()->json(['message' => 'Acción no válida.'], 400);
            }
        } catch (\Exception $e) {
            // Maneja errores.
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

// class PostController extends Controller
// {
//     //
// }