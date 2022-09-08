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

    public function getList(Request $request)
    {
        $ubs = $request->ubs;
        $equipe = $request->equipe;
        $microarea = "'$request->microarea'";

        $data['getList'] = PrenatalModel::listGestantes($ubs, $equipe, $microarea);
        return $data;
    }

    public function getGestante(Request $request)
    {
        $cidadao = $request->id; //523

        $data['getGestante'] = PrenatalModel::getGestante($cidadao);
        return $data;
    }
}
