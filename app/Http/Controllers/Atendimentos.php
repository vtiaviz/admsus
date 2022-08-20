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
        $data = [
            'ubs' => $request->ubs,
            'dtIni' => $request->dtIni,
            'dtFim' => $request->dtFim
        ];
        return($data);
        // $ubs = 0;
        // $dt_ini ='2022-08-01 00:00:00';
        // $dt_fim ='2022-08-01 23:59:59';
        // $dt_ini2 ='20220801';
        // $dt_fim2 ='20220801';

        // $data['consultaMedica'] = AtendimentosModel::consultaMedica($ubs, $dt_ini, $dt_fim);
        // $data['consultaEnfermagem'] = AtendimentosModel::consultaEnfermagem($ubs, $dt_ini, $dt_fim);
        // $data['consultaOdonto'] = AtendimentosModel::consultaOdonto($ubs, $dt_ini, $dt_fim);
        // $data['outrosProf'] = AtendimentosModel::outrosProf($ubs, $dt_ini, $dt_fim);
        // $data['escutaInicial'] = AtendimentosModel::escutaInicial($ubs, $dt_ini, $dt_fim);
        // $data['procedimentos'] = AtendimentosModel::procedimentos($ubs, $dt_ini, $dt_fim);
        // $data['vacinas'] = AtendimentosModel::vacinas($ubs, $dt_ini2, $dt_fim2);
        // $data['visitasAcs'] = AtendimentosModel::visitasAcs($ubs, $dt_ini2, $dt_fim2);

        // return $data;
    }
}
