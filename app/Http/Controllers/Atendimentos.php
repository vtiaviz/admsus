<?php

namespace AdmSus\Http\Controllers;

use Illuminate\Http\Request;
use AdmSus\AtendimentosModel;

class Atendimentos extends Controller
{
    public function atendimentos()
    {
        return view('atendimentos');
    }

    public function consulta(Request $request)
    {
        $ubs =$request->ubs;

        $dt_ini = date_create(str_replace("/", "-", $request->dtIni));
        $dt_ini = date_format($dt_ini, 'Y-m-d');

        $dt_fim = date_create(str_replace("/", "-", $request->dtFim));
        $dt_fim = date_format($dt_fim, 'Y-m-d');
        
        $dt_ini2 = explode('-', $dt_ini);
        $dt_ini2 = $dt_ini2[0] . $dt_ini2[1] . $dt_ini2[2];

        $dt_fim2 = explode('-', $dt_fim);
        $dt_fim2 = $dt_fim2[0] . $dt_fim2[1] . $dt_fim2[2];

        $data['periodo'] = [$request->dtIni, $request->dtFim];

        $data['consultaMedica'] = AtendimentosModel::consultaMedica($ubs, $dt_ini, $dt_fim);
        $data['consultaEnfermagem'] = AtendimentosModel::consultaEnfermagem($ubs, $dt_ini, $dt_fim);
        $data['consultaOdonto'] = AtendimentosModel::consultaOdonto($ubs, $dt_ini, $dt_fim);
        $data['outrosProf'] = AtendimentosModel::outrosProf($ubs, $dt_ini, $dt_fim);
        $data['escutaInicial'] = AtendimentosModel::escutaInicial($ubs, $dt_ini, $dt_fim);
        $data['procedimentos'] = AtendimentosModel::procedimentos($ubs=0, $dt_ini, $dt_fim);
        $data['vacinas'] = AtendimentosModel::vacinas($ubs, $dt_ini2, $dt_fim2);
        $data['visitasAcs'] = AtendimentosModel::visitasAcs($ubs, $dt_ini2, $dt_fim2);

        return $data;
    }
}
