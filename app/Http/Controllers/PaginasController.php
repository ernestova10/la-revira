<?php

namespace App\Http\Controllers;

class PaginasController extends Controller
{
    public function queOcurre()
    {
        return view('queOcurreSS.index'); 
    }

    public function celebraciones()
    {
        return view('celebraciones.index'); 
    }
}
