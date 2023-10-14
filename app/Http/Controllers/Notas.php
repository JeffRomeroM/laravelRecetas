<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiControlador extends Controller
{
    public function mostrarVista()
    {
        $variable = true; // Puedes asignar el valor que desees a la variable
        $elementos = ['Elemento 1', 'Elemento 2', 'Elemento 3']; // Un arreglo de elementos

        return view('notas', compact('variable', 'elementos'));
    }
}
