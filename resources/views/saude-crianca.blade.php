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
                            <h5 class="m-b-10 h3"><i class="fa-solid fa-syringe"  style="font-size: 160%;"></i> Vacinas Infantis</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Saúde da Criança / Vacinas</a></li>
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
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Vacinas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Sem Equipe</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Odontologia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Consolidado</a>
                        </li> -->
                    </ul>
                    <hr>
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
                        <h5>Crianças menores que 1 ano:</h5>
                        <hr>
                        <table class="table table-hover table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome da Criança</th>
                                    <th>Idade</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#modalGestante" data-toggle="modal">ADRIANA SILVA DE SOUSA</a></td>
                                    <td>5 meses</td>
                                    <td><span class="badge badge-light-success">Success</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>ALANA BRAZ MARTINS</td>
                                    <td>11 meses</td>
                                    <td><span class="badge badge-light-danger">Success</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>ANDREIA RIBEIRO DE AMORIM</td>
                                    <td>7 meses</td>
                                    <td><span class="badge badge-light-danger">Success</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>BARBARA FERREIRA DE SOUZA</td>
                                    <td>9 meses</td>
                                    <td><span class="badge badge-light-success">Success</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table end -->

                    <!-- Modal tipo #01 start-->
                    <div class="modal fade bd-table-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalGestante">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h4" id="myLargeModalLabel">Informações da Criança</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 card card-outline card-primary">
                                        <h5 class="card-header">ALANA BRAZ MARTINS</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="h6 my-2 text-muted"><strong class="text-dark">CNS: </strong>128.584.963.741</p>
                                                    <p class="h6 my-2 text-muted"><strong class="text-dark">Data Nascimento: </strong>14/02/2022</p>
                                                    <p class="h6 my-2 text-muted"><strong class="text-dark">Idade: </strong>3 meses</p>
                                                    <p class="h6 my-2 text-muted"><strong class="text-dark">Micro Área: </strong>04</p>
						                            
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="h6 my-2 text-muted"><strong class="text-dark">Nome da Mãe: </strong>Solange Ferreira Martins</p>
                                                    <p class="h6 my-2 text-muted"><strong class="text-dark">Telefone: </strong>9499214253</p>
                                                    <p class="h6 my-2 text-muted"><strong class="text-dark">Endereço: </strong>Estrada Vicinal Fortaleza, S/N - Zona Rural - CEP 68521000</p>
                                                </div>
                                            </div>
                                            <!-- <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label class="col-sm-12">Vacina dTpa Adulto:</label>
                                                    <div class="col-sm-12 btn btn-primary rounded">
                                                        26/05/2022
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-12">Última Consulta Médica: </label>
                                                    <div class="col-sm-12 btn btn-primary rounded">
                                                        26/05/2022
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="alert alert-danger mb-4" role="alert">
                                        <h4 class="alert-heading">Busca Ativa!</h4>
                                        <p class="h6">Favor realizar o cadastro individual vinculando-o à equipe pelo Agente de Saúde.</p>
                                    </div>

                                    <div class="col-md-12 card card-outline card-primary">
                                        <div class="card-body">
                                            <div class="accordion" id="accordiontable">
                                                <div class="card mb-0">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="h3"><i class="fa-solid fa-virus mr-2"></i></span> POLIOMELITE:</a></h5>
                                                    </div>
                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordiontable">
                                                        <div class="card-body row">
                                                            <div class="col-md-4">
                                                                <label class="col-sm-12">1ª Dose: </label>
                                                                <div class="col-md-12 btn btn-app btn-light active rounded">
                                                                    <b>Aplicada em </b><br>15/03/2022
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-sm-12">2ª Dose: </label>
                                                                <div class="col-md-12 btn btn-app btn-light active rounded">
                                                                    <b>4 MESES</b><br> Não Aplicada!
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-sm-12">3ª Dose: </label>
                                                                <div class="col-md-12 btn btn-app btn-danger active rounded">
                                                                    <b>6 MESES</b><br> Não Aplicada!
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-0">
                                                    <div class="card-header" id="headingTwo">
                                                        <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span class="h3"><i class="fa-solid fa-bacterium mr-2"></i></span> PENTAVALENTE:</a></h5>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordiontable">
                                                        <div class="card-body row">
                                                            <div class="col-md-4">
                                                                <label class="col-sm-12">1ª Dose: </label>
                                                                <div class="col-md-12 btn btn-app btn-light active rounded">
                                                                    <b>Aplicada em </b><br>15/03/2022
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-sm-12">2ª Dose: </label>
                                                                <div class="col-md-12 btn btn-app btn-light active rounded">
                                                                    <b>4 MESES</b><br> Não Aplicada!
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="col-sm-12">3ª Dose: </label>
                                                                <div class="col-md-12 btn btn-app btn-danger active rounded">
                                                                    <b>6 MESES</b><br> Não Aplicada!
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
