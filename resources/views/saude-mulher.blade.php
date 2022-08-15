<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include('includes.head') 
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
        @include('includes.sidebar')
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">		
        @include('includes.header')			
	</header>
	<!-- [ Header ] end -->
	
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 h3"><i class="fa-solid fa-microscope" style="font-size: 160%;"></i> Citopatológico</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Saúde da Mulher / Citopatológico</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Todas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Parto Próximo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Odontologia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Consolidado</a>
                        </li>
                    </ul> -->
                    <!-- <hr> -->
                    <!-- Form Start -->
                    <form class="mb-4 mt-3">
                        <div class="row mb-3 mt-3">
                            <div class="col-sm-4">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Unidade de Saúde</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Todas</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Equipe</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Todas equipes</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Micro Área</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Todas</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <button type="button" class="btn btn-dark rounded" style="width: 100%;">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Form end -->
                    <!-- Table start -->
                    <div class="table-responsive shadow p-3 mb-4 mt-4 bg-white rounded">
                        <h5>Mulheres na faixa etária:</h5>
                        <hr>
                        <table class="table table-hover table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>CNS/CPF</th>
                                    <th>Idade</th>
                                    <th>Contato</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ADRIANA SILVA DE SOUSA</td>
                                    <td>01934249246</td>
                                    <td>19 anos</td>
                                    <td>9499935241</td>
                                    <td><span class="badge badge-light-success">Success</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ALANA BRAZ MARTINS</td>
                                    <td>70171714202</td>
                                    <td>27 anos</td>
                                    <td>9499859620</td>
                                    <td><span class="badge badge-light-danger">Success</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>ANDREIA RIBEIRO DE AMORIM</td>
                                    <td>898004135317474</td>
                                    <td>31 anos</td>
                                    <td>9498965244</td>
                                    <td><span class="badge badge-light-danger">Success</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>BARBARA FERREIRA DE SOUZA</td>
                                    <td>07152839280</td>
                                    <td>42 anos</td>
                                    <td>9496321453</td>
                                    <td><span class="badge badge-light-success">Success</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table end -->
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- [ Main Content ] end -->
</div>
</div>
@include('includes.footer')

<!-- datatable js -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function () {
    $('#table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json',
            "sLengthMenu": ""
        },
        'sLengthMenu': false,
        'sSearch': false,
        'bFilter': false
    });
});
</script>

</body>

</html>
