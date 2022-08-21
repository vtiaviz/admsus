<?php

namespace AdmSus;

use Illuminate\Database\Eloquent\Model;

class PrenatalModel extends Model
{
    public static function listaGestantes()
    {
        $listaGestantes = \DB::select('SELECT

        gestante.cidadao,
    
        gestante.co_cidadao,
    
        gestante.no_cidadao,
    
        gestante.dt_nascimento,
    
        gestante.celular,
    
        gestante.cns,
    
        gestante.cpf,
    
        gestante.situacao,
    
        gestante.micro,
    
        gestante.dum,
    
        gestante.total_consulta,
    
        gestante.consulta_1,
    
        gestante.consulta_ult,
    
        gestante.semanas,
    
        gestante.semana_consulta_1,
    
        vdrl.vdrl_avaliacao,
    
        vdrl.vdrl_rapido,
    
        hiv.hiv_avaliacao,
    
        hiv.hiv_rapido,
    
        CASE WHEN MAX(odonto.dt_consulta) >= gestante.consulta_1 THEN MAX(odonto.dt_consulta) ELSE NULL END ultimo_odonto,
    
        CASE WHEN MAX(odonto.dt_consulta) >= gestante.consulta_1 THEN 1 ELSE NULL END consul_odonto,
    
        MAX(desfecho.dt_desfecho) dt_desfecho
    
    FROM 
    
        (SELECT DISTINCT 
    
            CASE 
    
                WHEN clinico.cidadao IS NOT NULL THEN clinico.cidadao
    
                WHEN referido.cidadao IS NOT NULL THEN referido.cidadao
    
                WHEN clinico.cidadao IS NULL THEN referido.cidadao
    
                WHEN referido.cidadao IS NULL THEN clinico.cidadao
    
            END AS cidadao,
    
            CASE 
    
                WHEN clinico.co_cidadao IS NOT NULL THEN clinico.co_cidadao
    
                WHEN referido.co_cidadao IS NOT NULL THEN referido.co_cidadao
    
                WHEN clinico.co_cidadao IS NULL THEN referido.co_cidadao
    
                WHEN referido.co_cidadao IS NULL THEN clinico.co_cidadao
    
            END AS co_cidadao,
    
            CASE 
    
                WHEN clinico.no_cidadao IS NOT NULL THEN clinico.no_cidadao
    
                WHEN referido.no_cidadao IS NOT NULL THEN referido.no_cidadao
    
                WHEN clinico.no_cidadao IS NULL THEN referido.no_cidadao
    
                WHEN referido.no_cidadao IS NULL THEN clinico.no_cidadao
    
            END AS no_cidadao,
    
            CASE 
    
                WHEN clinico.dt_nascimento IS NOT NULL THEN clinico.dt_nascimento
    
                WHEN referido.dt_nascimento IS NOT NULL THEN referido.dt_nascimento
    
                WHEN clinico.dt_nascimento IS NULL THEN referido.dt_nascimento
    
                WHEN referido.dt_nascimento IS NULL THEN clinico.dt_nascimento
    
            END AS dt_nascimento,
    
            CASE 
    
                WHEN clinico.celular IS NOT NULL THEN clinico.celular
    
                WHEN referido.celular IS NOT NULL THEN referido.celular
    
                WHEN clinico.celular IS NULL THEN referido.celular
    
                WHEN referido.celular IS NULL THEN clinico.celular
    
            END AS celular,
    
            CASE 
    
                WHEN clinico.cns IS NOT NULL THEN clinico.cns
    
                WHEN referido.cns IS NOT NULL THEN referido.cns
    
                WHEN clinico.cns IS NULL THEN referido.cns
    
                WHEN referido.cns IS NULL THEN clinico.cns
    
            END AS cns,
    
            CASE 
    
                WHEN clinico.cpf IS NOT NULL THEN clinico.cpf
    
                WHEN referido.cpf IS NOT NULL THEN referido.cpf
    
                WHEN clinico.cpf IS NULL THEN referido.cpf
    
                WHEN referido.cpf IS NULL THEN clinico.cpf
    
            END AS cpf,
    
            CASE
    
                WHEN clinico.situacao = 2 THEN "ClÃ­nico"
    
                WHEN referido.situacao = 1 THEN "Auto Referido"
    
            END AS situacao,
    
            CASE 
    
                WHEN clinico.micro IS NOT NULL THEN clinico.micro
    
                WHEN referido.micro IS NOT NULL THEN referido.micro
    
                WHEN clinico.micro IS NULL THEN referido.micro
    
                WHEN referido.micro IS NULL THEN clinico.micro
    
            END AS micro,
    
            clinico.dum,
    
            clinico.total_consulta,
    
            clinico.consulta_1,
    
            clinico.consulta_ult,
    
            clinico.semanas,
    
            clinico.semana_consulta_1
    
        FROM 
    
            (
    
            SELECT DISTINCT 
    
                consulta.cidadao,
    
                consulta.co_cidadao,
    
                consulta.no_cidadao,
    
                cadastro.dt_nascimento,
    
                cadastro.celular,
    
                cadastro.cns,
    
                cadastro.cpf,
    
                consulta.dum,
    
                cadastro.micro,
    
                consulta.total_consulta,
    
                consulta.consulta_1,
    
                consulta.consulta_ult,
    
                (EXTRACT(DAY FROM CURRENT_TIMESTAMP - consulta.dum)::integer)/7 AS semanas,
    
                (EXTRACT(DAY FROM consulta.consulta_1 - consulta.dum)::integer)/7 AS semana_consulta_1,
    
                CASE WHEN consulta.cidadao IS NOT NULL THEN 2 END AS situacao
    
            FROM 
    
                (
    
                SELECT 
    
                    tfcp.co_seq_fat_cidadao_pec cidadao,
    
                    tfcp.co_cidadao,
    
                    tfcp.no_cidadao,
    
                    tdt.dt_registro AS dum,
    
                    COUNT(tfcp.co_seq_fat_cidadao_pec) total_consulta,
    
                    MIN(tfai.dt_inicial_atendimento) consulta_1,
    
                    MAX(tfai.dt_inicial_atendimento) consulta_ult
    
                 FROM
    
                    tb_fat_atendimento_individual AS tfai,
    
                    tb_fat_cidadao_pec AS tfcp,
    
                    tb_dim_tempo AS tdt
    
                WHERE tfai.co_fat_cidadao_pec = tfcp.co_seq_fat_cidadao_pec
    
                AND tfai.co_dim_sexo = 2
    
                AND (tfai.co_dim_tipo_ficha = 4 OR tfai.co_dim_tipo_ficha = 9)
    
                AND tdt.co_seq_dim_tempo = (
    
                    SELECT MAX(tfai1.co_dim_tempo_dum)
    
                    FROM tb_fat_atendimento_individual tfai1 
    
                    WHERE tfai1.co_fat_cidadao_pec = tfai.co_fat_cidadao_pec
    
                    AND tfai1.co_dim_tempo_dum >= CAST(to_char((date_trunc("DAY", CURRENT_DATE) - INTERVAL "50 WEEK"), "yyyyMMDD") AS INTEGER)
    
                    AND tfai1.co_dim_tempo_dum <> 30001231
    
                    )
    
                AND tfai.dt_inicial_atendimento >= tdt.dt_registro 
    
                AND tfai.dt_inicial_atendimento >= (date_trunc("DAY", CURRENT_DATE) - INTERVAL "50 WEEK")
    
                AND (tfai.ds_filtro_cids LIKE "%|O00|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O09|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O10|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O11|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O12%|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O120%|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O121%|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O122|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O13|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O14|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O140|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O141|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O149|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O15|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O150|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O151|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O159|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O16|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O20|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O200|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O208|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O209|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O21|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O210|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O211|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O212|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O218|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O219|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O22|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O220|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O221|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O222|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O223|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O224|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O225|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O228|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O229|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O23|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O230|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O231|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O232|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O233|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O234|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O235|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O239|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O24|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O240|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O241|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O242|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O243|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O244|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O249|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O25|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O26|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O260|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O261|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O263|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O264|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O265|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O268|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O269|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O28|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O280|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O281|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O282|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O283|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O284|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O285|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O288|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O289|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O29|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O290|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O291|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O292|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O293|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O294|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O295|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O296|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O298|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O299|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O30|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O300|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O301|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O302|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O308|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O309|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O31|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O311|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O312|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O318|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O32|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O320|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O321|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O322|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O323|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O324|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O325|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O326|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O328|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O329|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O33|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O330|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O331|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O332|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O333|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O334|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O335|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O336|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O337|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O338|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O339|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O34|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O340|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O341|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O342|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O343|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O344|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O345|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O346|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O347|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O348|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O349|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O35|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O350|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O351|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O352|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O353|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O354|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O355|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O356|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O357|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O358|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O359|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O36|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O360|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O361|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O362|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O363|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O365|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O366|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O367|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O368|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O369|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O40|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O41|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O410|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O411|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O418|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O419|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O43|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O430|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O431|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O438|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O439|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O44|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O440|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O441|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O46|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O460|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O468|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O469|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O47|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O470|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O471|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O479|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O48|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O752|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O753|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O98|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O990|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O991|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O992|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O993|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O994|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O995|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O996|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|O997|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z34|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z35|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z36|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z321|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z33|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z34|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z340|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z348|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z349|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z350|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z351|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z352|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z353|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z354|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z357|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z358|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z359|%" OR
    
                    tfai.ds_filtro_cids LIKE "%|Z640|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W03|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W05|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W29|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W71|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W78|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W79|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W80|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W81|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W84|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|W85|%" OR
    
                    tfai.ds_filtro_ciaps LIKE "%|ABP001|%")
    
                GROUP BY 
    
                    tfcp.co_seq_fat_cidadao_pec,
    
                    tfcp.co_cidadao,
    
                    tfcp.no_cidadao,
    
                    tdt.dt_registro
    
                ) consulta
    
            RIGHT JOIN 
    
                (
    
                SELECT 
    
                    CASE 
    
                        WHEN pec.co_fat_cidadao_pec IS NOT NULL THEN pec.co_fat_cidadao_pec
    
                        WHEN cds.co_fat_cidadao_pec IS NOT NULL THEN cds.co_fat_cidadao_pec
    
                        WHEN pec.co_fat_cidadao_pec IS NULL THEN cds.co_fat_cidadao_pec
    
                        WHEN cds.co_fat_cidadao_pec IS NULL THEN pec.co_fat_cidadao_pec
    
                    END AS cidadao,
    
                    CASE 
    
                        WHEN pec.co_cidadao IS NOT NULL THEN pec.co_cidadao
    
                        WHEN cds.co_cidadao IS NOT NULL THEN cds.co_cidadao
    
                        WHEN pec.co_cidadao IS NULL THEN cds.co_cidadao
    
                        WHEN cds.co_cidadao IS NULL THEN pec.co_cidadao
    
                    END AS co_cidadao,
    
                    CASE
    
                        WHEN pec.no_cidadao IS NOT NULL THEN pec.no_cidadao
    
                        WHEN cds.no_cidadao IS NOT NULL THEN cds.no_cidadao
    
                        WHEN pec.no_cidadao IS NULL THEN cds.no_cidadao
    
                        WHEN cds.no_cidadao IS NULL THEN pec.no_cidadao
    
                    END AS no_cidadao,
    
                    CASE
    
                        WHEN pec.dt_nascimento IS NOT NULL THEN pec.dt_nascimento
    
                        WHEN cds.dt_nascimento IS NOT NULL THEN cds.dt_nascimento
    
                        WHEN pec.dt_nascimento IS NULL THEN cds.dt_nascimento
    
                        WHEN cds.dt_nascimento IS NULL THEN pec.dt_nascimento
    
                    END AS dt_nascimento,
    
                    CASE
    
                        WHEN pec.celular IS NOT NULL THEN pec.celular
    
                        WHEN cds.celular IS NOT NULL THEN cds.celular
    
                        WHEN pec.celular IS NULL THEN cds.celular
    
                        WHEN cds.celular IS NULL THEN pec.celular
    
                    END AS celular,
    
                    CASE
    
                        WHEN pec.cns IS NOT NULL THEN pec.cns
    
                        WHEN cds.cns IS NOT NULL THEN cds.cns
    
                        WHEN pec.cns IS NULL THEN cds.cns
    
                        WHEN cds.cns IS NULL THEN pec.cns
    
                    END AS cns,
    
                    CASE
    
                        WHEN pec.cpf IS NOT NULL THEN pec.cpf
    
                        WHEN cds.cpf IS NOT NULL THEN cds.cpf
    
                        WHEN pec.cpf IS NULL THEN cds.cpf
    
                        WHEN cds.cpf IS NULL THEN pec.cpf
    
                    END AS cpf,
    
                    CASE
    
                        WHEN cds.micro IS NOT NULL THEN cds.micro
    
                        WHEN pec.micro IS NOT NULL THEN pec.micro
    
                        WHEN pec.micro IS NULL AND cds.micro IS NULL THEN "CS"
    
                        WHEN pec.micro IS NULL THEN cds.micro
    
                        WHEN cds.micro IS NULL THEN pec.micro
    
                    END AS micro
    
                FROM 
    
                    (
    
                    SELECT
    
                        tfcp.co_cidadao,
    
                        tfcp.co_seq_fat_cidadao_pec co_fat_cidadao_pec,
    
                        tc.no_cidadao,
    
                        tc.dt_nascimento,
    
                        tfcp.nu_telefone_celular celular,
    
                        tfcp.nu_cns cns,
    
                        tfcp.nu_cpf_cidadao cpf,
    
                        tc.nu_micro_area micro
    
                    FROM
    
                        tb_cidadao_vinculacao_equipe tcve,
    
                        tb_dim_equipe tde, 
    
                        tb_cidadao tc,
    
                        tb_fat_cidadao_pec tfcp 
    
                    WHERE tcve.co_cidadao = tc.co_seq_cidadao
    
                    AND tde.nu_ine = tcve.nu_ine
    
                    AND tc.co_seq_cidadao = tfcp.co_cidadao 
    
                    AND tfcp.co_dim_sexo = 2
    
                    AND tcve.st_saida_cadastro_territorio = 0
    
                    AND tcve.st_saida_cadastro_obito = 0
    
                    AND tfcp.st_faleceu <> 1
    
                    AND tcve.nu_ine IS NOT NULL 
    
                    AND CASE WHEN $1 <> 0 THEN tfcp.co_dim_unidade_saude_vinc = $1 ELSE TRUE END
    
                    AND CASE WHEN $2 <> 0 THEN tde.co_seq_dim_equipe = $2 ELSE TRUE END
    
                    AND CASE 
    
                            WHEN $3 = "0" THEN TRUE 
    
                            WHEN $3 = "CS" THEN TRUE
    
                            ELSE FALSE 
    
                        END
    
                    ) AS pec
    
                FULL OUTER JOIN
    
                    (
    
                    SELECT
    
                        tfcp.co_cidadao,
    
                        tfci.co_fat_cidadao_pec,
    
                        tfcp.no_cidadao,
    
                        tfci.dt_nascimento,
    
                        tfcp.nu_telefone_celular celular,
    
                        tfcp.nu_cns cns,
    
                        tfcp.nu_cpf_cidadao cpf,
    
                        tfci.nu_micro_area micro
    
                    FROM
    
                        tb_fat_cad_individual tfci,
    
                        tb_fat_cidadao_pec tfcp 
    
                    WHERE   tfcp.co_seq_fat_cidadao_pec = tfci.co_fat_cidadao_pec 
    
                    AND tfcp.co_dim_sexo = 2
    
                    AND tfci.co_dim_tempo_validade = 30001231
    
                    AND tfci.co_dim_tipo_saida_cadastro = 3
    
                    AND tfci.st_ficha_inativa = 0
    
                    AND tfci.co_seq_fat_cad_individual = (
    
                        SELECT tfci2.co_seq_fat_cad_individual 
    
                        FROM tb_fat_cad_individual tfci2 
    
                        WHERE tfci2.co_fat_cidadao_pec = tfci.co_fat_cidadao_pec
    
                        AND tfci2.co_dim_tempo_validade = 30001231
    
                        ORDER BY tfci2.co_dim_tempo DESC LIMIT 1
    
                        )
    
                    AND CASE WHEN $1 <> 0 THEN tfci.co_dim_unidade_saude = $1 ELSE TRUE END
    
                    AND CASE WHEN $2 <> 0 THEN tfci.co_dim_equipe = $2 ELSE TRUE END
    
                    AND CASE 
    
                            WHEN $3 = "0" THEN TRUE 
    
                            WHEN $3 = "CS" THEN TRUE
    
                            ELSE tfci.nu_micro_area = $3 
    
                        END 
    
                    ) AS cds
    
                ON pec.co_cidadao = cds.co_cidadao
    
                ) AS cadastro
    
            ON cadastro.cidadao = consulta.cidadao
    
            WHERE consulta.cidadao IS NOT NULL 
    
            ) AS clinico
    
        FULL JOIN 
    
            (SELECT DISTINCT
    
                cad.co_fat_cidadao_pec cidadao,
    
                tfcp2.co_cidadao,
    
                tfcp2.no_cidadao,
    
                cad.dt_nascimento,
    
                tfcp2.nu_telefone_celular celular,
    
                tfcp2.nu_cns cns,
    
                tfcp2.nu_cpf_cidadao cpf,
    
                cad.nu_micro_area micro,
    
                CASE WHEN cad.co_fat_cidadao_pec IS NOT NULL THEN 1 END situacao
    
            FROM
    
                tb_fat_cad_individual cad,
    
                tb_fat_cidadao_pec tfcp2 
    
            WHERE   cad.st_gestante = 1
    
            AND cad.co_fat_cidadao_pec = tfcp2.co_seq_fat_cidadao_pec 
    
            AND CASE WHEN $1 <> 0 THEN cad.co_dim_unidade_saude = $1 ELSE TRUE END
    
            AND CASE WHEN $2 <> 0 THEN cad.co_dim_equipe = $2 ELSE TRUE END
    
            AND CASE 
    
                    WHEN $3 = "0" THEN TRUE 
    
                    WHEN $3 = "CS" THEN TRUE
    
                    ELSE cad.nu_micro_area = $3 
    
                END  
    
            AND cad.co_dim_tempo_validade = 30001231
    
            AND cad.co_dim_tipo_saida_cadastro = 3
    
            AND cad.st_ficha_inativa = 0
    
            AND cad.co_seq_fat_cad_individual = (
    
                SELECT co_seq_fat_cad_individual 
    
                FROM tb_fat_cad_individual 
    
                WHERE co_fat_cidadao_pec = cad.co_fat_cidadao_pec
    
                AND co_dim_tempo_validade = 30001231
    
                ORDER BY co_dim_tempo DESC LIMIT 1
    
                )
    
            GROUP BY 
    
                cad.co_fat_cidadao_pec,
    
                tfcp2.co_cidadao,
    
                tfcp2.no_cidadao,
    
                cad.dt_nascimento,
    
                tfcp2.nu_telefone_celular,
    
                tfcp2.nu_cns,
    
                tfcp2.nu_cpf_cidadao,
    
                cad.nu_micro_area
    
            ) referido
    
        ON clinico.cidadao = referido.cidadao) gestante
    
    LEFT JOIN 
    
        (
    
        SELECT DISTINCT 
    
            co_fat_cidadao_pec cidadao, 
    
            MAX(dt_inicial_atendimento) dt_consulta
    
        FROM 
    
            tb_fat_atendimento_odonto
    
        GROUP BY co_fat_cidadao_pec
    
        ) odonto
    
    ON gestante.cidadao = odonto.cidadao
    
    LEFT JOIN 
    
        (
    
        SELECT DISTINCT
    
            CASE 
    
                WHEN vdrl_a.cidadao IS NOT NULL THEN vdrl_a.cidadao
    
                WHEN vdrl_r.cidadao IS NOT NULL THEN vdrl_r.cidadao
    
            END AS cidadao,
    
            CASE WHEN vdrl_a.avaliacao_vdrl IS NOT NULL THEN 1 END vdrl_avaliacao,
    
            CASE WHEN vdrl_r.rapido_vdrl IS NOT NULL THEN 1 END vdrl_rapido
    
        FROM
    
            (SELECT DISTINCT
    
                tfai5.co_fat_cidadao_pec cidadao,
    
                MAX(tfai5.dt_inicial_atendimento) avaliacao_vdrl
    
            FROM
    
                tb_fat_atendimento_individual tfai5,
    
                tb_dim_tempo tdt
    
            WHERE tdt.co_seq_dim_tempo = (
    
                SELECT
    
                MAX(co_dim_tempo_dum)
    
                FROM
    
                tb_fat_atendimento_individual
    
                WHERE co_fat_cidadao_pec = tfai5.co_fat_cidadao_pec
    
                AND co_dim_tempo_dum <> 30001231)
    
            AND tfai5.dt_inicial_atendimento > tdt.dt_registro
    
            AND tfai5.co_dim_sexo = 2
    
            AND (tfai5.ds_filtro_proced_avaliados LIKE "%ABEX019%"
    
                OR tfai5.ds_filtro_proced_avaliados LIKE "%0202031110%"
    
                OR tfai5.ds_filtro_proced_avaliados LIKE "%0202031179%")
    
            GROUP BY tfai5.co_fat_cidadao_pec) AS vdrl_a
    
        FULL JOIN
    
            (SELECT DISTINCT
    
                tfpap.co_fat_cidadao_pec cidadao,
    
                MAX(tfpap.co_dim_tempo) rapido_vdrl
    
            FROM
    
                tb_fat_proced_atend_proced tfpap,
    
                tb_dim_procedimento tdp
    
            WHERE tfpap.co_dim_tempo >= (
    
                SELECT
    
                    MAX(co_dim_tempo_dum)
    
                FROM
    
                    tb_fat_atendimento_individual
    
                WHERE co_fat_cidadao_pec = tfpap.co_fat_cidadao_pec
    
                AND co_dim_tempo_dum <> 30001231)
    
            AND tdp.co_seq_dim_procedimento = tfpap.co_dim_procedimento
    
            AND (tdp.co_proced LIKE "%ABPG026%"
    
                OR tdp.co_proced LIKE "%0214010074%"
    
                OR tdp.co_proced LIKE "%0214010082%")
    
            GROUP BY tfpap.co_fat_cidadao_pec) vdrl_r
    
        ON vdrl_a.cidadao = vdrl_r.cidadao
    
        ) vdrl
    
    ON gestante.cidadao = vdrl.cidadao
    
    LEFT JOIN
    
        (SELECT DISTINCT
    
            CASE 
    
                WHEN hiv_a.cidadao IS NOT NULL THEN hiv_a.cidadao
    
                WHEN hiv_r.cidadao IS NOT NULL THEN hiv_r.cidadao
    
            END AS cidadao,
    
            CASE WHEN hiv_a.avaliacao_hiv IS NOT NULL THEN 1 END hiv_avaliacao,
    
            CASE WHEN hiv_r.st_rapido_hiv IS NOT NULL THEN 1 END hiv_rapido
    
        FROM
    
        (SELECT DISTINCT
    
            tfai6.co_fat_cidadao_pec cidadao,
    
            MAX(tfai6.dt_inicial_atendimento) avaliacao_hiv
    
        FROM
    
            tb_fat_atendimento_individual tfai6,
    
            tb_dim_tempo tdt
    
        WHERE tdt.co_seq_dim_tempo = (
    
            SELECT
    
            MAX(co_dim_tempo_dum)
    
            FROM
    
            tb_fat_atendimento_individual
    
            WHERE co_fat_cidadao_pec = tfai6.co_fat_cidadao_pec
    
            AND co_dim_tempo_dum <> 30001231)
    
        AND dt_inicial_atendimento > tdt.dt_registro
    
        AND tfai6.co_dim_sexo = 2
    
        AND (ds_filtro_proced_avaliados LIKE "%ABEX018%"
    
            OR ds_filtro_proced_avaliados LIKE "%0202030300%")
    
        GROUP BY tfai6.co_fat_cidadao_pec) hiv_a
    
    FULL JOIN
    
        (SELECT DISTINCT
    
            tfpap2.co_fat_cidadao_pec cidadao,
    
            MAX(tfpap2.co_dim_tempo) st_rapido_hiv
    
        FROM
    
            tb_fat_proced_atend_proced tfpap2,
    
            tb_dim_procedimento tdp 
    
        WHERE tfpap2.co_dim_tempo >= (
    
            SELECT
    
                MAX(co_dim_tempo_dum)
    
            FROM
    
                tb_fat_atendimento_individual
    
            WHERE co_fat_cidadao_pec = tfpap2.co_fat_cidadao_pec
    
            AND co_dim_tempo_dum <> 30001231)
    
            AND tdp.co_seq_dim_procedimento = tfpap2.co_dim_procedimento
    
            AND (tdp.co_proced LIKE "%ABPG023%"
    
            OR tdp.co_proced LIKE "%ABPG024%"
    
            OR tdp.co_proced LIKE "%0214010058%"
    
            OR tdp.co_proced LIKE "%0214010040%")
    
        GROUP BY tfpap2.co_fat_cidadao_pec) hiv_r
    
        ON hiv_a.cidadao = hiv_r.cidadao
    
        ) hiv
    
    ON gestante.cidadao = hiv.cidadao
    
    LEFT JOIN 
    
        (
    
        SELECT DISTINCT 
    
            atend.co_fat_cidadao_pec cidadao,
    
            MAX(atend.dt_inicial_atendimento) dt_desfecho
    
        FROM 
    
            tb_fat_atendimento_individual AS atend
    
        WHERE atend.dt_inicial_atendimento IS NOT NULL 
    
        AND atend.co_fat_cidadao_pec IS NOT NULL 
    
        AND (atend.ds_filtro_cids LIKE "%|O02|%" OR
    
            atend.ds_filtro_cids LIKE "%|O03|%" OR
    
            atend.ds_filtro_cids LIKE "%|O04|%" OR
    
            atend.ds_filtro_cids LIKE "%|O05|%" OR
    
            atend.ds_filtro_cids LIKE "%|O06|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z303|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z370|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z371|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z372|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z373|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z374|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z375|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z376|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z377|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z379|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z38|%" OR
    
            atend.ds_filtro_cids LIKE "%|Z39|%" OR
    
            atend.ds_filtro_cids LIKE "%|O42|%" OR
    
            atend.ds_filtro_cids LIKE "%|O45|%" OR
    
            atend.ds_filtro_cids LIKE "%|O60|%" OR
    
            atend.ds_filtro_cids LIKE "%|O61|%" OR
    
            atend.ds_filtro_cids LIKE "%|O62|%" OR
    
            atend.ds_filtro_cids LIKE "%|O63|%" OR
    
            atend.ds_filtro_cids LIKE "%|O64|%" OR
    
            atend.ds_filtro_cids LIKE "%|O65|%" OR
    
            atend.ds_filtro_cids LIKE "%|O66|%" OR
    
            atend.ds_filtro_cids LIKE "%|O67|%" OR
    
            atend.ds_filtro_cids LIKE "%|O68|%" OR
    
            atend.ds_filtro_cids LIKE "%|O69|%" OR
    
            atend.ds_filtro_cids LIKE "%|O70|%" OR
    
            atend.ds_filtro_cids LIKE "%|O71|%" OR
    
            atend.ds_filtro_cids LIKE "%|O73|%" OR
    
            atend.ds_filtro_cids LIKE "%|O750|%" OR
    
            atend.ds_filtro_cids LIKE "%|O751|%" OR
    
            atend.ds_filtro_cids LIKE "%|O754|%" OR
    
            atend.ds_filtro_cids LIKE "%|O755|%" OR
    
            atend.ds_filtro_cids LIKE "%|O756|%" OR
    
            atend.ds_filtro_cids LIKE "%|O757|%" OR
    
            atend.ds_filtro_cids LIKE "%|O758|%" OR
    
            atend.ds_filtro_cids LIKE "%|O759|%" OR
    
            atend.ds_filtro_cids LIKE "%|O80|%" OR
    
            atend.ds_filtro_cids LIKE "%|O81|%" OR
    
            atend.ds_filtro_cids LIKE "%|O82|%" OR
    
            atend.ds_filtro_cids LIKE "%|O83|%" OR
    
            atend.ds_filtro_cids LIKE "%|O84|%" OR
    
            atend.ds_filtro_ciaps LIKE "%|W82|%" OR
    
            atend.ds_filtro_ciaps LIKE "%|W83|%" OR
    
            atend.ds_filtro_ciaps LIKE "%|W90|%" OR
    
            atend.ds_filtro_ciaps LIKE "%|W91|%" OR
    
            atend.ds_filtro_ciaps LIKE "%|W92|%" OR
    
            atend.ds_filtro_ciaps LIKE "%|W93|%" OR
    
            atend.ds_filtro_ciaps LIKE "%|ABP002|%")
    
        GROUP BY atend.co_fat_cidadao_pec
    
        ) desfecho
    
    ON gestante.cidadao = desfecho.cidadao
    
    WHERE gestante.no_cidadao IS NOT NULL
    
    AND CASE WHEN $3 <> "CS" THEN TRUE ELSE gestante.micro = "CS" END 
    
    GROUP BY 
    
        gestante.cidadao,
    
        gestante.co_cidadao,
    
        gestante.no_cidadao,
    
        gestante.dt_nascimento,
    
        gestante.celular,
    
        gestante.cns,
    
        gestante.cpf,
    
        gestante.situacao,
    
        gestante.micro,
    
        gestante.dum,
    
        vdrl.vdrl_avaliacao,
    
        vdrl.vdrl_rapido,
    
        hiv.hiv_avaliacao,
    
        hiv.hiv_rapido,
    
        gestante.total_consulta,
    
        gestante.consulta_1,
    
        gestante.consulta_ult,
    
        gestante.semanas,
    
        gestante.semana_consulta_1
    
    ORDER BY gestante.no_cidadao',"parameters: $1 = '0', $2 = '0', $3 = '0'");

    }
}
