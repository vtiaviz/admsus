<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include('includes.head') 
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .loader {
            animation: is-rotating 1s infinite;
            border: 1em solid #e5e5e5;
            border-radius: 50%;
            border-top-color: #51d4db;
            height: 15em;
            width: 15em
        }

        #content-loader { 
            left:50%;
            top:50%;
            position: relative;
            margin-left:-8em; /* -1/2 width */
            margin-top:-8em; /* -1/2 height */
        }

        @keyframes is-rotating {
            to {
                transform: rotate(1turn);
            }
        }
    </style>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">

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
                            <h5 class="m-b-10 h3"><i class="fa-solid fa-person-pregnant" style="font-size: 160%;"></i> Gestantes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Pré-Natal / Todas</a></li>
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
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
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
                    </ul>
                    <hr>
                    <!-- Form Start -->
                    <form class="mb-4 mt-3">
                        <div class="row mb-3 mt-3">
                            <div class="col-sm-4">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="ubs">Unidade de Saúde</label>
                                    </div>
                                    <select name="ubs" class="custom-select" id="ubs">
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
                                        <label class="input-group-text" for="equipe">Equipe</label>
                                    </div>
                                    <select name="equipe" class="custom-select" id="equipe">
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
                                        <label class="input-group-text" for="microarea">Micro Área</label>
                                    </div>
                                    <select name="microarea" class="custom-select" id="microarea">
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
                        <h5>Todas as Gestantes:</h5>
                        <hr>
                        <table class="table table-hover table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>CPF/CNS</th>
                                    <th>Contato</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="resultado"></tbody>
                        </table>
                    </div>
                    
                    <!-- Table end -->

                    <!-- Modal tipo #01 start-->
                    <div id="modal_teste">
                        <div class="modal fade bd-table-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalGestante">
                            <div id="content-loader">
                                <div class="loader"></div>
                            </div>
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" id="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myLargeModalLabel">Informações da Gestante</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12 card card-outline card-primary">
                                            <h5 class="card-header" id="cardHeader"></h5>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-sm-12">Idade Gestacional: </label>
                                                        <div id="idadeGestacional" class="col-sm-12 btn btn-primary rounded"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-12">Previsão para o Parto: </label>
                                                        <div id="previsto" class="col-sm-12 btn btn-primary rounded"></div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <label class="col-sm-12">Vacina dTpa Adulto:</label>
                                                        <div id="dtpa" class="col-sm-12 btn btn-primary rounded"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-12">Última Consulta Médica: </label>
                                                        <div id="consulta_ult" class="col-sm-12 btn btn-primary rounded"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 card card-outline card-primary">
                                            <div class="card-body">
                                                <div class="accordion" id="accordiontable">
                                                    <div class="card mb-0">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="h3"><i class="fa-solid fa-stethoscope mr-2"></i></span> INDICADOR #01:</a></h5>
                                                        </div>
                                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordiontable">
                                                            <div class="card-body">
                                                                <h5 class="card-title">1ª Consulta Médica</h5>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="col-sm-12">Data da Consulta: </label>
                                                                        <div id="consulta_1" class="col-sm-12 btn d-inline-block mr-2 border border-primary rounded"></div>
                                                                        <label class="col-sm-12 mt-3">Semana de Gestação: </label>
                                                                        <div id="semanas" class="col-sm-12 btn d-inline-block mr-2 border border-primary rounded"></div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="col-sm-12">Total de Consultas: </label>
                                                                        <div class="border border-primary rounded p-3 pt-3 pb-4">
                                                                            <h1 id="total_consulta"></h1>
                                                                            <div class="progress">
                                                                                <div class="progress-bar" style="width: 100%">
                                                                                </div>
                                                                            </div>
                                                                            <span class="progress-description">
                                                                                100% completo
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-0">
                                                        <div class="card-header" id="headingTwo">
                                                            <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span class="h3"><i class="fa-solid fa-syringe mr-2"></i></span> INDICADOR #02:</a></h5>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordiontable">
                                                            <div class="card-body row">
                                                                <div class="col-sm-6">
                                                                    <h5 class="card-title">Exame VDRL</h5>
                                                                    <div id="vdrl_solicitacao" class="col-sm-12 btn d-inline-block mr-2 border border-primary rounded"></div>
                                                                    <div id="vdrl_avaliacao" class="col-sm-12 btn d-inline-block mr-2 border border-primary rounded mt-1 mb-1"></div>
                                                                    <div id="vdrl_rapido" class="col-sm-12 btn d-inline-block mr-2 border border-primary rounded"></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <h5 class="card-title">Exame HIV</h5>
                                                                    <div id="hiv_solicitacao" class="col-sm-12 btn d-inline-block mr-2 border border-primary rounded"></div>
                                                                    <div id="hiv_avaliacao" class="col-sm-12 btn d-inline-block mr-2 border border-primary rounded mt-1 mb-1"></div>
                                                                    <div id="hiv_rapido" class="col-sm-12 btn d-inline-block mr-2 border border-primary rounded"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-0">
                                                        <div class="card-header" id="headingThree">
                                                            <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span class="h3"><i class="fa-solid fa-tooth mr-2"></i></span> INDICADOR #03:</a></h5>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordiontable">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Consulta Odontológica</h5>
                                                                <div class="col-md-12">
                                                                    <label class="col-sm-12">Data Última Consulta: </label>
                                                                    <div id="ultimo_odonto" class="col-sm-12 btn border border-primary rounded"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal  tipo #01 end -->

                    <!-- Modal tipo #02 start-->
                    <!-- <div class="modal fade bd-table-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel02" aria-hidden="true" id="modalGestante02">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h4" id="myLargeModalLabel02">Informações da Gestante</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 card card-outline card-primary">
                                        <h5 class="card-header">Nome: ALANA BRAZ MARTINS<span> | Contato: 94991605908</span><span> | Micro Área: 04</span></h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="info-box bg-warning rounded pt-3 pb-4 px-4">
                                                        <span class="info-box-icon h2">
                                                            <i class="fa-solid fa-person-breastfeeding"></i> <span class="h3">Puérpera</span>
                                                        </span>
                                                        <div class="info-box-content mt-2">
                                                            <span class="info-box-text">
                                                                Gestação com desfecho em
                                                                <b>01/02/2022.</b>
                                                            </span><br>
                                                            <span class="info-box-text">Paciente com desfecho gestacional,
                                                                porém permanece no Cadastro Individual do ACS.
                                                            Última atualização em 01/10/2021.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="info-box bg-danger rounded p-4">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">
                                                                 Favor atualizar o cadastro.
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Modal  tipo #02 end -->
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- [ Main Content ] end -->
</div>
</div>

<!-- datatable js -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="assets/js/plugins/apexcharts.min.js"></script> -->
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>

<script src="assets/js/prenatal.js"></script>

</body>

</html>
