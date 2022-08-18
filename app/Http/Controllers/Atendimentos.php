<?php

namespace AdmSus\Http\Controllers;

use Illuminate\Http\Request;

class Atendimentos extends Controller
{
    public function atendimentos()
    {
        return view('atendimentos');
    }
}
