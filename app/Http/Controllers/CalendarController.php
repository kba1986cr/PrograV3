<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class CalendarController extends Controller
{
    /**
     * Manejar la selección de días en el calendario.
     */
    public function store(Request $request)
    {
        // Obtener las fechas enviadas desde el cliente
        $start = $request->input('start');
        $end = $request->input('end');

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
}

    
