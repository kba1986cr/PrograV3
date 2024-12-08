<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    // Muestra la lista de puestos
    public function index()
    {
        return view('puestos.index', ['puestos' => Puesto::all()]);
    }

    // Muestra el formulario para crear un nuevo puesto
    public function create()
    {
        return view('puestos.create');
    }

    // Almacena un nuevo puesto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'salario_base' => 'required|numeric',
        ]);

        Puesto::create($request->all());
        return redirect()->route('puestos.index')->with('success', 'Puesto creado exitosamente.');
    }

    // Muestra un puesto específico
    public function show($id)
    {
        $puesto = Puesto::findOrFail($id);
        return view('puestos.show', compact('puesto'));
    }

    // Muestra el formulario para editar un puesto existente
    public function edit($id)
    {
        $puesto = Puesto::findOrFail($id);
        return view('puestos.edit', compact('puesto'));
    }

    // Actualiza un puesto existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'salario_base' => 'required|numeric',
        ]);

        $puesto = Puesto::findOrFail($id);
        $puesto->update($request->all());

        return redirect()->route('puestos.index')->with('success', 'Puesto actualizado exitosamente.');
    }

    // Elimina un puesto
    public function destroy($id)
    {
        $puesto = Puesto::findOrFail($id);
        $puesto->delete();

        return redirect()->route('puestos.index')->with('success', 'Puesto eliminado exitosamente.');
    }
}
