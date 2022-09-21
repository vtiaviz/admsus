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

            // console.log(data.getList)

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

            $('#table').DataTable({
                "oLanguage": {
                    "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Exibindo _TOTAL_ registros",
                        "sInfoEmpty": "Exibindo 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "",
                    "sSearchPlaceholder": "Buscar",
                    "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                },
                'sLengthMenu': false,
                'sSearch': false,
                'bFilter': false
            });

        },
        error: function(e){
            console.log(e);
        }
    });
}

function getGestante(id) {

    $('#modal-content').hide()
    $('#content-loader').show()
    // $('.loader').show()


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

            console.log(data)

            function clearClass(id) {
                if ($(id).hasClass('btn-danger')) {
                    return $(id).removeClass('btn-danger').html('')
                } else if ($(id).hasClass('btn-success')) {
                    return $(id).removeClass('btn-success').html('')
                }
            }
            
            clearClass('#vdrl_solicitacao');
            clearClass('#vdrl_avaliacao');
            clearClass('#vdrl_rapido');
            clearClass('#hiv_solicitacao');
            clearClass('#hiv_avaliacao');
            clearClass('#hiv_rapido');
            clearClass('#ultimo_odonto');

            function trataDados(params, returnN, returnY) {
                if (params == null) {
                    return ['btn-danger', returnN]
                } else {
                    return ['btn-success', returnY]
                }
            }

            var vdrl_avaliacao = trataDados(data[0].vdrl_avaliacao, 'Não Avaliado', 'Avaliado')
            var vdrl_rapido = trataDados(data[0].vdrl_rapido, 'Sem Teste Rápido', 'Teste Rápido')
            var vdrl_solicitacao = trataDados(data[0].vdrl_solicitacao, 'Não Solicitado', 'Solicitado')

            var hiv_avaliacao = trataDados(data[0].hiv_avaliacao, 'Não Avaliado', 'Avaliado')
            var hiv_rapido = trataDados(data[0].hiv_rapido, 'Sem Teste Rápido', 'Teste Rápido')
            var hiv_solicitacao = trataDados(data[0].hiv_solicitacao, 'Não Solicitado', 'Solicitado')

            function trataData(params) {
                if (params == null) {
                    return 'Não realizado'
                } else {
                   return params.substring(0, 10).split('-').reverse().join('/')
                }
            }

            var consulta_ult = trataData(data[0].consulta_ult)
            var consulta_1 = trataData(data[0].consulta_1)
            var ultimo_odonto = trataData(data[0].ultimo_odonto)
            var dtpa = trataData(data[0].dtpa)

            if (ultimo_odonto == 'Não realizado') {
                ultimo_odonto = ['btn-danger', 'Não realizado']
            } else {
                ultimo_odonto = ['btn-primary', ultimo_odonto]
            }

            var total_consulta = (data[0].total_consulta == null) ? '0' : data[0].total_consulta;

            // var consulta_ult = (data[0].consulta_ult != null) ? data[0].consulta_ult.substring(0, 10).split('-').reverse().join('/') : 'Sem consulta';
            // var consulta_1 = (data[0].consulta_1 != null) ? data[0].consulta_1.substring(0, 10).split('-').reverse().join('/') : 'Sem consulta';
            
            // var ultimo_odonto = (data[0].ultimo_odonto != null) ? ['btn-primary', data[0].ultimo_odonto.substring(0, 10).split('-').reverse().join('/') ] : ['btn-danger', 'Sem Consulta']
            
            $('#cardHeader').html('Nome: ' + data[0].no_cidadao + '<span> | Contato: ' +  data[0].celular + '</span><span> | Micro Área: ' +  data[0].micro + '</span>');
            $('#consulta_ult').html(consulta_ult)
            $('#consulta_1').html(consulta_1)
            $('#total_consulta').html(total_consulta)
            $('#dtpa').html(dtpa)
            $('#ultimo_odonto').addClass(ultimo_odonto[0]).html(ultimo_odonto[1])
            $('#semanas').html(data[0].semanas + 'ª Semana')
            $('#vdrl_avaliacao').addClass(vdrl_avaliacao[0]).html(vdrl_avaliacao[1])
            $('#vdrl_rapido').addClass(vdrl_rapido[0]).html(vdrl_rapido[1])
            $('#vdrl_solicitacao').addClass(vdrl_solicitacao[0]).html(vdrl_solicitacao[1])
            $('#hiv_avaliacao').addClass(hiv_avaliacao[0]).html(hiv_avaliacao[1])
            $('#hiv_rapido').addClass(hiv_rapido[0]).html(hiv_rapido[1])
            $('#hiv_solicitacao').addClass(hiv_solicitacao[0]).html(hiv_solicitacao[1])

            let idadeGestacional = 'Não calculado';
            let previsto = 'Não calculado';
            let diasPrevisao = '';
            let totalAtual = '';
            let totalDum = '';

            if (data[0].dum != null) {
                let dum = data[0].dum.split('-');
                let anoDum = dum[0] * 365;
                let mesDum = dum[1] * 30;
                let diaDum = dum[2] * 1;
                totalDum = anoDum + mesDum + diaDum

                var data = new Date();
                var diaAtual = String(data.getDate()).padStart(2, '0') * 1;
                var mesAtual = String(data.getMonth() + 1).padStart(2, '0') * 30;
                var anoAtual = String(data.getFullYear()).padStart(4, '0') * 365;
                totalAtual = anoAtual + mesAtual + diaAtual

                let total = totalAtual - totalDum;

                diasPrevisao = 280 - total;
                data.setDate(data.getDate() + diasPrevisao);
                let dia = String(data.getDate()).padStart(2, '0')
                let mes = String(data.getMonth() + 1).padStart(2, '0')
                previsto =  dia + '/' +  mes + '/' + data.getFullYear()


                let semanas = Math.trunc(total/7)
                let dias = total%7

                idadeGestacional = semanas + ' Semana(s) e ' + dias + ' dia(s)';

            }
            console.log(diasPrevisao)
            console.log(totalAtual)
            console.log(totalDum)

            $('#idadeGestacional').html(idadeGestacional)
            $('#previsto').html(previsto)
            
            // $('.loader').hide()
            $('#content-loader').hide()
            $('#modal-content').show()

        },
        error: function(e){
            console.log(e);
        }
    });
}
