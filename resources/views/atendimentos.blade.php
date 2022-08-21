<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include('includes.head') 

    <meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .loader {
        animation: is-rotating 1s infinite;
        border: 6px solid #e5e5e5;
        border-radius: 50%;
        border-top-color: #51d4db;
        height: 50px;
        width: 50px;
    }

    @keyframes is-rotating {
        to {
            transform: rotate(1turn);
        }
    }
</style>
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
                            <h5 class="m-b-10 h3"><i class="fa-solid fa-hospital-user" style="font-size: 160%;"></i> Atendimentos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Atendimentos / Geral</a></li>
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
                    <!-- Form Start -->
                    <form class="mb-4 mt-3" name="consulta" action="#" method="post" autocomplete="off">
                        <div class="row mb-3 mt-3">
                                <div class="col-sm-4">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Unidade de Saúde</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="ubs">
                                            <option selected>Todas</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">        
                                        <div class="input-group date" data-date-format="dd/mm/yyyy">
                                            <label class="input-group-text" for="inputGroupSelect02">Data Inicial</label>
                                            <input name="dtIni"  class="form-control border border-muted px-3" placeholder="">
                                            <div class="input-group-addon" >
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">        
                                        <div class="input-group date" data-date-format="dd/mm/yyyy">
                                            <label class="input-group-text" for="inputGroupSelect03">Data Final</label>
                                            <input name="dtFim" class="form-control border border-muted px-3" placeholder="">
                                            <div class="input-group-addon" >
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <button class="btn btn-dark rounded" style="width: 100%;">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Form end -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-white bg-primary ">
                                <div class="card-header">Consultas Médicas</div>
                                <div class="card-body row">
                                    <div class="h1 px-3"><i class="fa-solid fa-user-doctor"></i></div>
                                    <h1 class="card-title text-white px-3 medico">
                                        <div class="loader"></div>
                                    </h1>
                                </div>
                                <small class="card-footer text-white periodo"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-secondary  ">
                                <div class="card-header">Consultas Enfermagem</div>
                                <div class="card-body row">
                                    <div class="h1 px-3"><i class="fa-solid fa-user-nurse"></i></div>
                                    <h1 class="card-title text-white px-3 enfermagem">
                                        <div class="loader"></div>
                                    </h1>
                                </div>
                                <small class="card-footer text-white periodo"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-success">
                                <div class="card-header">Consultas Odontologica</div>
                                <div class="card-body row">
                                    <div class="h1 px-3"><i class="fa-solid fa-tooth"></i></div>
                                    <h1 class="card-title text-white px-3 odonto">
                                        <div class="loader"></div>
                                    </h1>
                                </div>
                                <small class="card-footer text-white periodo"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-danger ">
                                <div class="card-header">Outros Prof. Nivel Superior</div>
                                <div class="card-body row">
                                    <div class="h1 px-3"><i class="fa-solid fa-star-of-life"></i></div>
                                    <h1 class="card-title text-white px-3 outrosProf">
                                        <div class="loader"></div>
                                    </h1>
                                </div>
                                <small class="card-footer text-white periodo"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-white bg-warning ">
                                <div class="card-header">Escuta Inicial</div>
                                <div class="card-body row">
                                    <div class="h1 px-3"><i class="fa-solid fa-laptop-medical"></i></div>
                                    <h1 class="card-title text-white px-3 escutaInicial">
                                        <div class="loader"></div>
                                    </h1>
                                </div>
                                <small class="card-footer text-white periodo"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-info ">
                                <div class="card-header">Procedimentos</div>
                                <div class="card-body row">
                                    <div class="h1 px-3"><i class="fa-solid fa-stethoscope"></i></div>
                                    <h1 class="card-title text-white px-3 procedimentos">
                                        <div class="loader"></div>
                                    </h1>
                                </div>
                                <small class="card-footer text-white periodo"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-dark bg-light ">
                                <div class="card-header border-bottom">Vacinas</div>
                                <div class="card-body row">
                                    <div class="h1 px-3"><i class="fa-solid fa-syringe"></i></div>
                                    <h1 class="card-title px-3 vacinas">
                                        <div class="loader"></div>
                                    </h1>
                                </div>
                                <small class="card-footer periodo"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-dark ">
                                <div class="card-header">Visitas ACS</div>
                                <div class="card-body row">
                                    <div class="h1 px-3"><i class="fa-solid fa-house-medical-circle-check"></i></div>
                                    <h1 class="card-title text-white px-3 visitasACS">
                                        <div class="loader"></div>
                                    </h1>
                                </div>
                                <small class="card-footer text-white periodo"></small>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
        <!-- [ Main Content ] end -->
</div>
</div>

@include('includes.footer')

<!-- Plugin pro Datapicker novo -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
<script>
 $('.input-group.date').datepicker({format: "dd/mm/yyyy"});
</script>
<script src="assets/js/consulta.js"></script>


</body>

</html>
