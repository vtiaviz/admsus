<?php

namespace AdmSus\Http\Controllers;

use Illuminate\Http\Request;

class ResultadosController extends Controller
{
    public function resultados()
    {
        return view('resultados');
    }
}
