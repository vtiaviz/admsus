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

            // let qtd = data.getList.length;

            $('#cardHeader').html('Nome: ' + data.getGestante[0].no_cidadao + '<span> | Contato: ' +  data.getGestante[0].celular + '</span><span> | Micro Área: ' +  data.getGestante[0].micro + '</span>');
            $('#previsto').html(data.getGestante[0].consulta_ult.substring(0, 10).split('-').reverse().join('/'))
            $('#consulta_ult').html(data.getGestante[0].consulta_ult.substring(0, 10).split('-').reverse().join('/'))
            $('#consulta_1').html(data.getGestante[0].consulta_1.substring(0, 10).split('-').reverse().join('/'))
            $('#consul_odonto').html(data.getGestante[0].consul_odonto.substring(0, 10).split('-').reverse().join('/'))
            $('#semanas').html(data.getGestante[0].semanas + 'ª Semana')
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
