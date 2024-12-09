<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuestoController extends Controller
{

    public function create()
    {
        $puestos = Puesto::all();
        return view('post.puestoPost.registrarPuesto', compact('puestos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_puesto' => 'required|string|max:255',
            'salario_puesto' => 'required|numeric',
        ]);

        Puesto::create([
            'nombre' => $request->input('nombre_puesto'),
            'salario_base' => $request->input('salario_puesto'),
        ]);

        return redirect()->back()->with('success', 'Puesto creado exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_puesto' => 'required|string|max:255',
            'salario_puesto' => 'required|numeric',
        ]);

        $puesto = Puesto::findOrFail($id);
        $puesto->update([
            'nombre' => $request->input('nombre_puesto'),
            'salario_base' => $request->input('salario_puesto'),
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $puesto = Puesto::findOrFail($id);
        $puesto->delete();

        return response()->json(['success' => true]);
    }

    //     public function store(Request $request)
    //     {
    //         $request->validate([
    //             'nombre_puesto' => 'required|string|max:255', // nombre del campo en el formulario
    //             'salario_puesto' => 'required|numeric', // nombre del campo en el formulario
    //         ]);

    //         // Crear un nuevo puesto
    //         Puesto::create([
    //             'nombre' => $request->input('nombre_puesto'), // nombre del campo en el formulario
    //             'salario_base' => $request->input('salario_puesto'), // nombre del campo en el formulario
    //         ]);

    //         return redirect()->back()->with('success', 'Puesto creado exitosamente.');
    //     }

    //     // public function index()
    //     // {

    //     //     return view('puestos.index', ['puestos' => Puesto::all()]);
    //     // }

    //     public function create()
    // {
    //     $puestos = Puesto::all();
    //     return view('post.puestoPost.registrarPuesto', compact('puestos'));
    // }

}


// $puestos = Puesto::all();
// return view('puestos.index', compact('puestos'));