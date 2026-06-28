<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjusteController extends Controller
{
    public function index()
    {
        // Lógica para mostrar la vista de ajustes
        return view('admin.ajustes.index');
    }

    public function store(Request $request)
    {
        // Lógica para almacenar los ajustes
        // Validar y guardar los datos del formulario
        // Redirigir o mostrar un mensaje de éxito
    }
}
