$(document).ready(function () {

    var data = new Date()
    var dia = String(data.getDate()).padStart(2, '0')
    var mes = String(data.getMonth() + 1).padStart(2, '0')
    var ano = data.getFullYear()
    var dtAtual = dia + '/' + mes + '/' + ano

    var dtIni = dtAtual
    var dtFim = dtAtual
    const ubs = 0

    consulta(ubs, dtIni, dtFim)

    $('form[name="consulta"]').submit(function (event) {
        event.preventDefault();
    
        const form = $(this);
        const ubs = form.find('select[name="ubs"]').val();
        const dtIni = form.find('input[name="dtIni"]').val();
        const dtFim = form.find('input[name="dtFim"]').val();
        
        $('.medico').html('<div class="loader"></div>')
        $('.enfermagem').html('<div class="loader"></div>')
        $('.odonto').html('<div class="loader"></div>')
        $('.outrosProf').html('<div class="loader"></div>')
        $('.escutaInicial').html('<div class="loader"></div>')
        $('.procedimentos').html('<div class="loader"></div>')
        $('.vacinas').html('<div class="loader"></div>')
        $('.visitasACS').html('<div class="loader"></div>')

        consulta(ubs, dtIni, dtFim)

    });

});

function consulta(ubs, dtIni, dtFim) {   

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:"POST", crossDomain: true, cache: false,
        url: window.location.pathname + "/consulta",
        data:{ubs: ubs, dtIni: dtIni, dtFim: dtFim},
        dataType:'json',
        success: function (data){
            
            $('.periodo').html('Periodo: ' + data['periodo'][0] +' a ' + data['periodo'][1])
            $('.medico').html(data['consultaMedica'])
            $('.enfermagem').html(data['consultaEnfermagem'])
            $('.odonto').html(data['consultaOdonto'])
            $('.outrosProf').html(data['outrosProf'])
            $('.escutaInicial').html(data['escutaInicial'])
            $('.procedimentos').html(data['procedimentos'])
            $('.vacinas').html(data['vacinas'])
            $('.visitasACS').html(data['visitasAcs'])

        },
        error: function(e){
            console.log(e);
        }
    });
}
