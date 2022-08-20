<?php

namespace AdmSus;

use Illuminate\Database\Eloquent\Model;

class AtendimentosModel extends Model
{
    public static function consultaMedica($ubs, $dt_ini, $dt_fim)
    {
        $medicoCds = \DB::select('SELECT COUNT(atend.co_seq_cds_atend_individual) AS valor

                        FROM tb_cds_atend_individual AS atend,

                        tb_cds_ficha_atend_individual AS ficha, 

                        tb_cds_prof AS prof, 

                        tb_prof

                        WHERE ficha.dt_ficha >= ? 

                        AND ficha.dt_ficha <= ?

                        AND (tb_prof.co_conselho_classe = 71 OR tb_prof.co_conselho_classe = 83)

                        AND ficha.co_cds_prof = prof.co_seq_cds_prof

                        AND ficha.co_seq_cds_ficha_atend_indivdl = atend.co_cds_ficha_atend_individual

                        AND prof.nu_cns = tb_prof.nu_cns',  [$dt_ini, $dt_fim]);


        $medicoPec = \DB::select('SELECT COUNT(tb_atend_prof.tp_atend_prof) AS valor                 

                        FROM tb_atend_prof

                        WHERE (tb_atend_prof.tp_atend_prof = 1 

                        OR tb_atend_prof.tp_atend_prof = 8

                        OR tb_atend_prof.tp_atend_prof = 9

                        OR tb_atend_prof.tp_atend_prof = 11)

                        AND (tb_atend_prof.co_conselho_classe = 71 OR tb_atend_prof.co_conselho_classe = 83)

                        AND tb_atend_prof.dt_inicio >= ?

                        AND tb_atend_prof.dt_inicio <= ?

                        AND tb_atend_prof.st_atend_prof = 2', [$dt_ini, $dt_fim]);


        return $medicoCds[0]->valor  + $medicoPec[0]->valor;
    }

    public static function consultaEnfermagem($ubs, $dt_ini, $dt_fim)
    {
        $enfermagemPec = \DB::select("SELECT COUNT(tb_atend_prof.tp_atend_prof) AS valor                 

                        FROM tb_atend_prof, tb_lotacao, tb_cbo

                        WHERE tb_atend_prof.dt_inicio >= ? 

                        AND tb_atend_prof.dt_inicio <= ?

                        AND tb_atend_prof.st_atend_prof = 2

                        AND tb_atend_prof.tp_atend_prof <> 2

                        AND tb_atend_prof.co_lotacao = tb_lotacao.co_ator_papel

                        AND tb_lotacao.co_cbo = tb_cbo.co_cbo

                        AND (tb_cbo.co_cbo_2002 = '223505'

                        OR tb_cbo.co_cbo_2002 = '223565')", [$dt_ini, $dt_fim]);

        $enfermagemCds = \DB::select("SELECT COUNT(atend.co_seq_cds_atend_individual) AS valor

                        FROM tb_cds_atend_individual AS atend,

                        tb_cds_ficha_atend_individual AS ficha, 

                        tb_cds_prof AS prof

                        WHERE ficha.dt_ficha >= ? 

                        AND ficha.dt_ficha <= ?

                        AND ficha.co_cds_prof = prof.co_seq_cds_prof

                        AND ficha.co_seq_cds_ficha_atend_indivdl = atend.co_cds_ficha_atend_individual

                        AND (prof.nu_cbo_2002 = '223505'

                        OR prof.nu_cbo_2002 = '223565')", [$dt_ini, $dt_fim]);
        
        return  $enfermagemCds[0]->valor + $enfermagemPec[0]->valor;
    }

    public static function consultaOdonto($ubs, $dt_ini, $dt_fim)
    {
        $odontoCds = \DB::select("SELECT COUNT(atend.co_seq_cds_atend_odonto) AS valor

                        FROM tb_cds_atend_odonto AS atend,

                        tb_cds_ficha_atend_odonto AS ficha,  

                        tb_cds_prof AS prof

                        WHERE ficha.dt_ficha >= ? 

                        AND ficha.dt_ficha <= ?

                        AND ficha.co_cds_prof = prof.co_seq_cds_prof

                        AND ficha.co_seq_cds_ficha_atend_odonto = atend.co_cds_ficha_atend_odonto

                        AND (prof.nu_cbo_2002 = '223208'

                        OR prof.nu_cbo_2002 = '223293')", [$dt_ini, $dt_fim]);

        $odontoPec = \DB::select("SELECT COUNT(tb_atend_prof.tp_atend_prof) AS valor                 

                        FROM tb_atend_prof, tb_lotacao, tb_cbo

                        WHERE tb_atend_prof.dt_inicio >= ? 

                        AND tb_atend_prof.dt_inicio <= ?

                        AND tb_atend_prof.st_atend_prof = 2

                        AND tb_atend_prof.tp_atend_prof <> 2

                        AND tb_atend_prof.co_lotacao = tb_lotacao.co_ator_papel

                        AND tb_lotacao.co_cbo = tb_cbo.co_cbo

                        AND (tb_cbo.co_cbo_2002 = '223208' 

                        OR tb_cbo.co_cbo_2002 = '223293')", [$dt_ini, $dt_fim]);
        
        return  $odontoCds[0]->valor + $odontoPec[0]->valor;
    }

    public static function vacinas($ubs, $dt_ini, $dt_fim)
    {
        $vacinaCds = \DB::select("SELECT COUNT(vac.co_seq_registro_vacinacao) AS valor                    

                        FROM tb_registro_vacinacao AS vac

                        WHERE vac.dt_aplicacao >= ? 

                        AND vac.dt_aplicacao <= ?

                        AND vac.st_registro_anterior = 1", [$dt_ini, $dt_fim]);

        $vacinaPec = \DB::select("SELECT COUNT(tb_fat_vacinacao_vacina.co_dim_municipio) AS valor                  

                        FROM tb_fat_vacinacao_vacina

                        WHERE tb_fat_vacinacao_vacina.co_dim_tempo >= ? 

                        AND tb_fat_vacinacao_vacina.co_dim_tempo <= ?", [$dt_ini, $dt_fim]);
        
        return  $vacinaCds[0]->valor + $vacinaPec[0]->valor;
    }

    public static function outrosProf($ubs, $dt_ini, $dt_fim)
    {
        $profCds = \DB::select("SELECT COUNT(atend.co_seq_cds_atend_individual) AS valor

                        FROM tb_cds_atend_individual AS atend,

                        tb_cds_ficha_atend_individual AS ficha,  

                        tb_cds_prof AS prof

                        WHERE ficha.dt_ficha >= ? 

                        AND ficha.dt_ficha <= ?

                        AND ficha.co_cds_prof = prof.co_seq_cds_prof

                        AND ficha.co_seq_cds_ficha_atend_indivdl = atend.co_cds_ficha_atend_individual

                        AND (prof.nu_cbo_2002 LIKE '2238%'  -- Fonoaudiologo

                        OR prof.nu_cbo_2002 LIKE '2241%'  -- EducaÃ§Ã£o fisica

                        OR prof.nu_cbo_2002 LIKE '2233%'  -- MÃ©dico VeterinÃ¡rio

                        OR prof.nu_cbo_2002 LIKE '2516%'  -- Assistente Social

                        OR prof.nu_cbo_2002 LIKE '2234%'  -- Farmaceutico

                        OR prof.nu_cbo_2002 LIKE '2236%'  -- Fsioterapeuta

                        OR prof.nu_cbo_2002 LIKE '2237%'  -- Nutricionista

                        OR prof.nu_cbo_2002 LIKE '2515%') -- Psicologo", [$dt_ini, $dt_fim]);

        $profPec = \DB::select("SELECT COUNT(tb_atend_prof.tp_atend_prof) AS valor                 

                        FROM tb_atend_prof, tb_lotacao, tb_cbo

                        WHERE tb_atend_prof.dt_inicio >= ? 

                        AND tb_atend_prof.dt_inicio <= ?

                        AND (tb_atend_prof.tp_atend_prof = 1 

                        OR tb_atend_prof.tp_atend_prof = 8

                        OR tb_atend_prof.tp_atend_prof = 9

                        OR tb_atend_prof.tp_atend_prof = 11)

                        AND tb_atend_prof.tp_atend_prof <> 2

                        AND tb_atend_prof.st_atend_prof = 2

                        AND tb_atend_prof.co_lotacao = tb_lotacao.co_ator_papel

                        AND tb_lotacao.co_cbo = tb_cbo.co_cbo

                        AND (tb_cbo.co_cbo_2002 LIKE '2238%'  -- Fonoaudiologo

                        OR tb_cbo.co_cbo_2002 LIKE '2241%'  -- EducaÃ§Ã£o fisica

                        OR tb_cbo.co_cbo_2002 LIKE '2233%'  -- MÃ©dico VeterinÃ¡rio

                        OR tb_cbo.co_cbo_2002 LIKE '2516%'  -- Assistente Social

                        OR tb_cbo.co_cbo_2002 LIKE '2234%'  -- Farmaceutico

                        OR tb_cbo.co_cbo_2002 LIKE '2236%'  -- Fsioterapeuta

                        OR tb_cbo.co_cbo_2002 LIKE '2237%'  -- Nutricionista

                        OR tb_cbo.co_cbo_2002 LIKE '2515%') -- Psicologo", [$dt_ini, $dt_fim]);
        
        return  $profCds[0]->valor + $profPec[0]->valor;
    }

    public static function escutaInicial($ubs, $dt_ini, $dt_fim)
    {
        $escutaInicial = \DB::select("SELECT COUNT(tb_atend_prof.tp_atend_prof) AS valor                 

                        FROM tb_atend_prof

                        WHERE tb_atend_prof.dt_inicio >= ? 

                        AND tb_atend_prof.dt_inicio <= ?

                        AND tb_atend_prof.tp_atend_prof = 2

                        AND (tb_atend_prof.co_conselho_classe IS NULL

                        OR tb_atend_prof.co_conselho_classe <> 75)", [$dt_ini, $dt_fim]);
        
        return  $escutaInicial[0]->valor;
    }

    public static function visitasAcs($ubs, $dt_ini, $dt_fim)
    {
        $visitasAcs = \DB::select("SELECT COUNT(tb_fat_visita_domiciliar.co_dim_tempo) AS valor 

                        FROM tb_fat_visita_domiciliar

                        WHERE co_dim_tempo >= ?

                        AND co_dim_tempo <= ?", [$dt_ini, $dt_fim]);
        
        return  $visitasAcs[0]->valor;
    }

    public static function procedimentos($ubs, $dt_ini, $dt_fim)
    {
        $procedimentos = \DB::select("SELECT COUNT(rap.co_seq_atend_proced) AS proc  

                        FROM RL_ATEND_PROCED RAP,

                            TB_PROCED TP,

                            TB_ATEND_PROF TAP,

                            TB_ATEND TA,

                            TB_LOTACAO TL,

                            TB_PROF TP2,

                            TB_TIPO_ATEND_PROF TTAP,

                            TB_CBO TC,

                            TB_UNIDADE_SAUDE TUS 

                        where tap.DT_INICIO >= ?

                        and tap.DT_INICIO <= ?

                        and tp.CO_PROCED_FORMA_ORGANIZACIONAL <> 17

                        and tp.CO_PROCED_FORMA_ORGANIZACIONAL <> 213

                        and tc.co_cbo_2002 not like '2232%'

                        AND CASE WHEN ? <> 0 THEN tus.CO_SEQ_UNIDADE_SAUDE = ? ELSE TRUE END

                        and RAP.CO_PROCED = TP.CO_SEQ_PROCED 

                        and RAP.CO_ATEND_PROF = TAP.CO_SEQ_ATEND_PROF 

                        and TAP.CO_ATEND = TA.CO_SEQ_ATEND 

                        and tap.CO_LOTACAO = tl.CO_ATOR_PAPEL 

                        and tl.CO_PROF = tp2.CO_SEQ_PROF 

                        and tap.TP_ATEND_PROF = ttap.CO_TIPO_ATEND_PROF

                        and ttap.CO_TIPO_ATEND_PROF <> 6

                        and tl.CO_CBO = tc.CO_CBO 

                        and ta.CO_UNIDADE_SAUDE = tus.CO_SEQ_UNIDADE_SAUDE", [$dt_ini, $dt_fim, $ubs, $ubs]);
                        
        return  $procedimentos[0]->proc;
    }
}
