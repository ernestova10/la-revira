<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hermandad; // Importante para que el controlador conozca el modelo

class HermandadController extends Controller
{
    public function index()
        {
        // Obtenemos todas las hermandades de la BD
        $hermandades = Hermandad::all(); 

        // Las enviamos a la vista 'hermandades.index'
        return view('hermandades.index', compact('hermandades'));
        }

    public function show($slug)
        {
            // Buscamos la hermandad usando el slug que viene en la URL
            $hermandad = \App\Models\Hermandad::where('slug', $slug)->firstOrFail();

            // Cargamos la vista de detalle pasándole los datos de esa hermandad
            return view('hermandades.hermandad', compact('hermandad'));
        }    
}




    
