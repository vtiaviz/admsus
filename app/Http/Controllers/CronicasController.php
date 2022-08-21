<?php

namespace AdmSus\Http\Controllers;

use Illuminate\Http\Request;

class CronicasController extends Controller
{
    public function doencasCronicas()
    {
        return view('doencas-cronicas');
    }
}
