$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('form[name="consulta"]').submit(function (event) {
        event.preventDefault();

        const form = $(this);
        const action = form.attr('action');
        const ubs = form.find('select[name="ubs"]').val();
        const dtIni = form.find('input[name="dtIni"]').val();
        const dtFim = form.find('input[name="dtFim"]').val();

        $.post(action, {ubs: ubs, dtIni: dtIni, dtFim: dtFim}, function (response) {
            console.log('teste');
            // if(response.message) {
                // alert('Mensagem de erro: ' + response.message)
                // ajaxMessage(response.message, 3);
            // }

            // if(response.redirect) {
            //     window.location.href = response.redirect;
            // }
        }, 'json');

    });

});