// {
//     public function loggin()
//     {
//         return view('loggin', [
//             'turnos' => Turno::all(),
//         ]);
//     }


//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'dia' => 'required|date', // Verifica que sea una fecha válida
//             'turno' => 'required|string', // Verifica que sea un texto
//             'hora_inicio' => 'required|date_format:H:i', // Verifica formato de hora
//             'hora_fin' => 'required|date_format:H:i|after:hora_inicio', // 'hora_fin' debe ser posterior a 'hora_inicio'
//             'nota' => 'nullable|string', // Permite texto opcional
//         ]);

//         $turno = Turno::create($validated);

//         return response()->json(['message' => 'Turno guardado exitosamente', 'turno' => $turno]);

//         try {
//             $validated = $request->validate([
//                 'dia' => 'required|date',
//                 'turno' => 'required|string',
//                 'hora_inicio' => 'required|date_format:H:i',
//                 'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
//                 'nota' => 'nullable|string',
//             ]);

//             $turno = Turno::create($validated);

//             return response()->json(['message' => 'Turno guardado exitosamente', 'turno' => $turno]);
//         } catch (\Exception $e) {
//             return response()->json(['message' => 'Error al guardar el turno', 'error' => $e->getMessage()], 500);
//         }
//     }

//     public function update(Request $request, $id)
//     {
//         $validated = $request->validate([
//             'dia' => 'required|date',
//             'turno' => 'required|string',
//             'hora_inicio' => 'required|date_format:H:i',
//             'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
//             'nota' => 'nullable|string',
//         ]);

//         $turno = Turno::findOrFail($id);
//         $turno->update($validated);

//         return response()->json(['message' => 'Turno actualizado exitosamente', 'turno' => $turno]);
//     }

//     public function destroy($id)
//     {
//         $turno = Turno::find($id);

//         if ($turno) {
//             $turno->delete();
//             return response()->json(['message' => 'Turno eliminado exitosamente']);
//         }

//         return response()->json(['message' => 'Turno no encontrado'], 404);
//     }

//     public function index()
//     {
//         $turnos = Turno::paginate(10); // Cambia el 10 por la cantidad de registros por página
//         return view('loggin', compact('turnos'));
//     }

// }

// {
//     public function index()
//     {
//         $turnos = Turno::get();
//         return view('loggin', ['turnos' => $turnos]);
//     }
// }