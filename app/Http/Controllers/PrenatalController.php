<?php

namespace AdmSus\Http\Controllers;

use Illuminate\Http\Request;
use AdmSus\PrenatalModel;

class PrenatalController extends Controller
{
    public function prenatal()
    {
        return view('prenatal');
    }

    public function Consulta(Request $request)
    {
        $ubs = $request->ubs;
        $equipe = $request->equipe;
        $microarea = $request->microarea;

        $data['listaGestantes'] = PrenatalModel::listaGestantes($ubs, $equipe, $microarea);
        return $data;
    }
}
