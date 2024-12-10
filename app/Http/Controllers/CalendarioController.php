<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Puesto;

class CalendarioController extends Controller
{

    /**
     * Manejar la selección de días en el calendario.
     */
    public function store(Request $request)
    {
        // Asegúrate de que las fechas se reciban correctamente
    $start = $request->input('start');
    $end = $request->input('end');

    // Valida las fechas (si es necesario)
    if (!$start || !$end) {
        return response()->json(['error' => 'Fechas inválidas'], 400);
    }

        // Aquí puedes guardar los datos en la base de datos o realizar otra acción
        // Ejemplo: Registrar en la base de datos (opcional)
        /*
        DB::table('calendar_selections')->insert([
            'start_date' => $start,
            'end_date' => $end,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        */

        // Retornar una respuesta en JSON
        return response()->json([
            'message' => 'Fechas seleccionadas correctamente',
            'start' => $start,
            'end' => $end,
        ]);
    }
    // Renderizar la vista del calendario con los turnos
    public function index()
    {
        $puestos = Puesto::all();
        return view('loggin', ['puestos' => $puestos]);
    }

     
    }

    // // Guardar un nuevo turno
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'fecha' => 'required|date',
    //         'turno' => 'required|string',
    //         'hora_inicio' => 'nullable|date_format:H:i',
    //         'hora_fin' => 'nullable|date_format:H:i',
    //         'nota' => 'nullable|string',
    //     ]);

    //     Turno::create($request->all());

    //     return response()->json(['message' => 'Turno guardado exitosamente.']);
    // }

    // // Actualizar un turno existente
    // public function update(Request $request, $id)
    // {
    //     $turno = Turno::findOrFail($id);

    //     $request->validate([
    //         'fecha' => 'required|date',
    //         'turno' => 'required|string',
    //         'hora_inicio' => 'nullable|date_format:H:i',
    //         'hora_fin' => 'nullable|date_format:H:i',
    //         'nota' => 'nullable|string',
    //     ]);

    //     $turno->update($request->all());

    //     return response()->json(['message' => 'Turno actualizado exitosamente.']);
    // }

    // // Eliminar un turno
    // public function destroy($id)
    // {
    //     Turno::findOrFail($id)->delete();

    //     return response()->json(['message' => 'Turno eliminado exitosamente.']);
    // }

    // public function show($fecha)
    // {
    //     // Buscar turnos por fecha
    //     $turno = Turno::where('fecha', $fecha)->first();

    //     if ($turno) {
    //         return response()->json([
    //             'success' => true,
    //             'turno' => $turno,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'No se encontraron turnos para esta fecha.',
    //         ]);
    //     }
    // }


// class CalendarioController extends Controller
// {
//     Renderizar la vista del calendario con los turnos
//     public function index()
//     {
//         return view('loggin');
//     }

//     Obtener los turnos para un mes específico
//     public function getTurnosByMonth($year, $month)
//     {
//         $turnos = Turno::whereYear('fecha', $year)
//             ->whereMonth('fecha', $month)
//             ->get();

//         return response()->json(['turnos' => $turnos]);
//     }

//     Guardar un nuevo turno
//     public function store(Request $request)
//     {
//         $request->validate([
//             'fecha' => 'required|date',
//             'turno' => 'required|string',
//             'hora_inicio' => 'nullable|date_format:H:i',
//             'hora_fin' => 'nullable|date_format:H:i',
//             'nota' => 'nullable|string',
//         ]);

//         Turno::create($request->all());

//         return response()->json(['message' => 'Turno guardado exitosamente.']);
//     }

//     Actualizar un turno existente
//     public function update(Request $request, $id)
//     {
//         $turno = Turno::findOrFail($id);

//         $request->validate([
//             'fecha' => 'required|date',
//             'turno' => 'required|string',
//             'hora_inicio' => 'nullable|date_format:H:i',
//             'hora_fin' => 'nullable|date_format:H:i',
//             'nota' => 'nullable|string',
//         ]);

//         $turno->update($request->all());

//         return response()->json(['message' => 'Turno actualizado exitosamente.']);
//     }

//     Eliminar un turno
//     public function destroy($id)
//     {
//         Turno::findOrFail($id)->delete();

//         return response()->json(['message' => 'Turno eliminado exitosamente.']);
//     }
// }