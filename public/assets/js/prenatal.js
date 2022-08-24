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
            
            alert('Chegou!');

        },
        error: function(e){
            console.log(e);
        }
    });
}
