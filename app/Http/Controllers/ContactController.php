<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Enviar el correo
        Mail::to('contacto@empresa.com')->send(new ContactMessage(
            $request->input('name'),
            $request->input('email'),
            $request->input('message')
        ));

        return back()->with('success', 'Mensaje enviado correctamente');
    }
}

