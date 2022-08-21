<?php

namespace AdmSus\Http\Controllers;

use Illuminate\Http\Request;

class CriancasController extends Controller
{
    public function saudeCrianca()
    {
        return view('saude-crianca');
    }
}
