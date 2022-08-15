<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>AdmSUS - Dashboard para eSUS</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/dadae15646.js" crossorigin="anonymous"></script>

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- datatable css -->
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
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header mb-3">
						<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
						<div class="user-details mt-2">
							<div id="more-details">Brejo Grande do Araguaia</div>
						</div>
                        <hr>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
					    <label>Monitoramento</label>
					</li>
					<li class="nav-item">
					    <a href="atendimentos.html" class="nav-link "><span class="pcoded-micon"><i class="fa-solid fa-house-chimney-medical" style="font-size: 130%;"></i></span><span class="pcoded-mtext">Atendimentos </span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Previne Brasil</label>
					</li>
					<li class="nav-item">
					    <a href="prenatal.html" class="nav-link "><span class="pcoded-micon"><i class="fa-solid fa-person-pregnant" style="font-size: 160%;"></i></span><span class="pcoded-mtext">Pré-Natal</span></a>
					</li>
                    <li class="nav-item">
					    <a href="saude-mulher.html" class="nav-link "><span class="pcoded-micon"><i class="fa-solid fa-venus" style="font-size: 160%;"></i></span><span class="pcoded-mtext">Saúde da mulher</span></a>
					</li>
                    <li class="nav-item">
					    <a href="saude-crianca.html" class="nav-link "><span class="pcoded-micon"><i class="fa-solid fa-children" style="font-size: 130%;"></i></span><span class="pcoded-mtext">Saúde da criança</span></a>
					</li>
                    <li class="nav-item pcoded-trigger">
					    <a href="doencas-cronicas.html" class="nav-link "><span class="pcoded-micon"><i class="fa-solid fa-pills" style="font-size: 130%;"></i></span><span class="pcoded-mtext">Doenças crônicas</span></a>
					</li>
                    <li class="nav-item">
					    <a href="resultados.html" class="nav-link "><span class="pcoded-micon"><i class="fa-solid fa-chart-line" style="font-size: 130%;"></i></span><span class="pcoded-mtext">Previsão Resultados</span></a>
					</li>

				</ul>				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">		
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="assets/images/logo.png" alt="" class="logo">
                <img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user h3"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>John Doe</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>			
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
                            <h5 class="m-b-10 h3"><i class="fa-solid fa-capsules" style="font-size: 160%"></i> Diabéticos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Doenças Crônicas/ Diabetes</a></li>
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
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Diabéticos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Hipertensos</a>
                        </li>
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
                        <h5>Diabéticos Monitorados:</h5>
                        <hr>
                        <table class="table table-hover table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CNS/CPF</th>
                                    <th>Idade</th>
                                    <th>Contato</th>
                                    <th>Situação</th>
                                    <th>Consulta</th>
                                    <th>Exame</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ADRIANA SILVA DE SOUSA</td>
                                    <td>01934249246</td>
                                    <td>74</td>
                                    <td>9499935241</td>
                                    <td>Avaliado</td>
                                    <td>Não Realizada</td>
                                    <td>Não Realizado</td>
                                    <td><span class="badge badge-light-success">Success</span></td>
                                </tr>
                                <tr>
                                    <td>ALANA BRAZ MARTINS</td>
                                    <td>70171714202</td>
                                    <td>65</td>
                                    <td>9499859620</td>
                                    <td>Clinico</td>
                                    <td>Não Realizada</td>
                                    <td>Não Realizado</td>
                                    <td><span class="badge badge-light-danger">Success</span></td>
                                </tr>
                                <tr>
                                    <td>ANDREIA RIBEIRO DE AMORIM</td>
                                    <td>898004135317474</td>
                                    <td>59</td>
                                    <td>9498965244</td>
                                    <td>Clinico</td>
                                    <td>Não Realizada</td>
                                    <td>Não Realizado</td>
                                    <td><span class="badge badge-light-danger">Success</span></td>
                                </tr>
                                <tr>
                                    <td>BARBARA FERREIRA DE SOUZA</td>
                                    <td>07152839280</td>
                                    <td>64</td>
                                    <td>9496321453</td>
                                    <td>Auto Referido</td>
                                    <td>Não Realizada</td>
                                    <td>Não Realizado</td>
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
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/ripple.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-main.js"></script>

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
