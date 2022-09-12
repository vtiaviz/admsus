$(document).ready(function () {

    const ubs = 0
    const equipe = 0
    const microarea = 0

    getList(ubs, equipe, microarea)

    $('form[name="consulta"]').submit(function (event) {
        event.preventDefault();
    
        const form = $(this);
        const ubs = form.find('select[name="ubs"]').val();
        const equipe = form.find('select[name="equipe"]').val();
        const microarea = form.find('select[name="microarea"]').val();
        
        getList(ubs, equipe, microarea)

    });

});

function getList(ubs, equipe, microarea) {   

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:"POST", crossDomain: true, cache: false,
        url: "/prenatal/getList",
        data:{ubs: ubs, equipe: equipe, microarea: microarea},
        dataType:'json',
        success: function (data){

            console.log(data.getList)

            let qtd = data.getList.length;

            $('#resultado').html('');
            
            for (var x = 0; qtd > x; x++) {
                var doc = data.getList[x].cns != null ? data.getList[x].cns + ' (CNS)' : data.getList[x].cpf + ' (CPF)'
                $('#resultado').append(`
                <tr>
                    <td>${x+1}</td>
                    <td><a href="#modalGestante" data-toggle="modal" onclick="getGestante(${data.getList[x].cidadao})" >${data.getList[x].no_cidadao}</a></td>
                    <td>${doc}</td>
                    <td>${data.getList[x].celular}</td>
                    <td><span class="badge badge-light-success">Success</span></td>
                </tr>`)
              }

            // <tr>
            //     <td>1</td>
            //     <td><a href="#modalGestante" data-toggle="modal">ADRIANA SILVA DE SOUSA</a></td>
            //     <td>01934249246</td>
            //     <td><span class="badge badge-light-success">Success</span></td>
            // </tr>

        },
        error: function(e){
            console.log(e);
        }
    });
}

function getGestante(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:"POST", crossDomain: true, cache: false,
        url: "/prenatal/getGestante",
        data:{id: id},
        dataType:'json',
        success: function (data){

            console.log(data.getGestante)

            var vdrl_avaliacao = (data.getGestante[0].vdrl_avaliacao == null) ? ['btn-danger', 'Não Avaliado'] : ['btn-success', 'Avaliado'];
            var vdrl_rapido = (data.getGestante[0].vdrl_rapido == null) ? ['btn-danger', 'Sem Teste Rápido'] : ['btn-success', 'Teste Rápido'];
            var vdrl_solicitacao = (data.getGestante[0].vdrl_solicitacao == null) ? ['btn-danger', 'Não Solicitado'] : ['btn-success', 'Solicitado'];

            var hiv_avaliacao = (data.getGestante[0].hiv_avaliacao == null) ? ['btn-danger', 'Não Avaliado'] : ['btn-success', 'Avaliado'];
            var hiv_rapido = (data.getGestante[0].hiv_rapido == null) ? ['btn-danger', 'Sem Teste Rápido'] : ['btn-success', 'Teste Rápido'];
            var hiv_solicitacao = (data.getGestante[0].hiv_solicitacao == null) ? ['btn-danger', 'Não Solicitado'] : ['btn-success', 'Solicitado'];

            var consulta_ult = (data.getGestante[0].consulta_ult != null) ? data.getGestante[0].consulta_ult.substring(0, 10).split('-').reverse().join('/') : 'Sem consulta';
            var consulta_1 = (data.getGestante[0].consulta_1 != null) ? data.getGestante[0].consulta_1.substring(0, 10).split('-').reverse().join('/') : 'Sem consulta';
            
            var ultimo_odonto = (data.getGestante[0].ultimo_odonto != null) ? ['btn-primary', data.getGestante[0].ultimo_odonto.substring(0, 10).split('-').reverse().join('/') ] : ['btn-danger', 'Sem Consulta']
            
            $('#cardHeader').html('Nome: ' + data.getGestante[0].no_cidadao + '<span> | Contato: ' +  data.getGestante[0].celular + '</span><span> | Micro Área: ' +  data.getGestante[0].micro + '</span>');
            $('#consulta_ult').html(consulta_ult)
            $('#consulta_1').html(consulta_1)
            $('#ultimo_odonto').addClass(ultimo_odonto[0]).html(ultimo_odonto[1])
            $('#semanas').html(data.getGestante[0].semanas + 'ª Semana')
            $('#vdrl_avaliacao').addClass(vdrl_avaliacao[0]).html(vdrl_avaliacao[1])
            $('#vdrl_rapido').addClass(vdrl_rapido[0]).html(vdrl_rapido[1])
            $('#vdrl_solicitacao').addClass(vdrl_solicitacao[0]).html(vdrl_solicitacao[1])
            $('#hiv_avaliacao').addClass(hiv_avaliacao[0]).html(hiv_avaliacao[1])
            $('#hiv_rapido').addClass(hiv_rapido[0]).html(hiv_rapido[1])
            $('#hiv_solicitacao').addClass(hiv_solicitacao[0]).html(hiv_solicitacao[1])

            let idadeGestacional = 'Não calculado';
            let previsto = 'Não calculado';

            if (data.getGestante[0].dum != null) {
                let dum = data.getGestante[0].dum.split('-');
                let anoDum = dum[0] * 365;
                let mesDum = dum[1] * 30;
                let diaDum = dum[2] * 1;
                let totalDum = anoDum + mesDum + diaDum

                var data = new Date();
                var diaAtual = String(data.getDate()).padStart(2, '0') * 1;
                var mesAtual = String(data.getMonth() + 1).padStart(2, '0') * 30;
                var anoAtual = String(data.getFullYear()).padStart(4, '0') * 365;
                let totalAtual = anoAtual + mesAtual + diaAtual

                let total = totalAtual - totalDum;

                let diasPrevisao = 280 - total;
                data.setDate(data.getDate() + diasPrevisao);
                previsto = ((data.getDay() < 10) ? '0'+data.getDay() : data.getDay()) + '/' + data.getMonth() + '/' + data.getFullYear()

                let semanas = Math.round(total/7)
                let dias = total%7

                idadeGestacional = semanas + ' Semana(s) e ' + dias + ' dia(s)';

            }

            $('#idadeGestacional').html(idadeGestacional)
            $('#previsto').html(previsto)
            

            // var doc = data.getList[x].cns != null ? data.getList[x].cns + ' (CNS)' : data.getList[x].cpf + ' (CPF)'
            // $('#resultado').append(`
            //     <tr>
            //         <td>${x+1}</td>
            //         <td><a href="#modalGestante" data-toggle="modal" onclick="getGestante(${data.getList[x].cidadao})" >${data.getList[x].no_cidadao}</a></td>
            //         <td>${doc}</td>
            //         <td>${data.getList[x].celular}</td>
            //         <td><span class="badge badge-light-success">Success</span></td>
            //     </tr>`)

        },
        error: function(e){
            console.log(e);
        }
    });
}
