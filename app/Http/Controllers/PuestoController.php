<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function index()
    {
        return view('puestos.index', ['puestos' => Puesto::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'salario_base' => 'required|numeric',
        ]);

        Puesto::create($request->all());
        return redirect()->back()->with('success', 'Puesto creado exitosamente.');
    }
}
