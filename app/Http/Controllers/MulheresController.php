<?php

namespace AdmSus\Http\Controllers;

use Illuminate\Http\Request;

class MulheresController extends Controller
{
    public function saudeMulher()
    {
        return view('saude-mulher');
    }
}
