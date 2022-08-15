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
                            <h5 class="m-b-10 h3"><i class="fa-solid fa-chart-line"  style="font-size: 160%;"></i> Resultado dos Indicadores</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Previsão Resultados / Resultados</a></li>
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
                    <!-- <div class="card-header">
                        <h4>Resultados</h4>
                    </div> -->
                    <!-- <hr> -->
                    <!-- Form Start -->
                    <form class="mb-5 mt-4">
                        <div class="row mb-3 mt-3">
                            <div class="col-sm-5">
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
                            <div class="col-sm-5">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Quadrimestre</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Q1 - 2022</option>
                                        <option value="1">Q2 - 2022</option>
                                        <option value="2">Q3 - 2022</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <button type="button" class="btn btn-dark rounded" style="width: 100%;">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Form end -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header badge-light-dark">
                                    <h5 class="text-dark">Pré-Natal [6 consultas]</h5>
                                </div>
                                <canvas class="my-4" id="myChart1"></canvas>
                                <div class="card-footer">
                                    <small class="text-muted">Meta: 45%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header badge-light-dark">
                                    <h5 class="text-dark">Pré-Natal [Saúde Bucal]</h5>
                                </div>
                                <canvas class="my-4" id="myChart2"></canvas>
                                <div class="card-footer">
                                    <small class="text-muted">Meta: 60%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header badge-light-dark">
                                    <h5 class="text-dark">Pré-Natal [Sífilis e HIV]</h5>
                                </div>
                                <canvas class="my-4" id="myChart3"></canvas>
                                <div class="card-footer">
                                    <small class="text-muted">Meta: 60%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header badge-light-dark">
                                    <h5 class="text-dark">Saúde da Criança [Polio e Penta]</h5>
                                </div>
                                <canvas class="my-4" id="myChart4"></canvas>
                                <div class="card-footer">
                                    <small class="text-muted">Meta: 60%</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header badge-light-dark">
                                    <h5 class="text-dark">Saúde da Mulher [Citopatológico]</h5>
                                </div>
                                <canvas class="my-4" id="myChart5"></canvas>
                                <div class="card-footer">
                                    <small class="text-muted">Meta: 60%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header badge-light-dark">
                                    <h5 class="text-dark">Doenças Crônicas [Diabetes]</h5>
                                </div>
                                <canvas class="my-4" id="myChart6"></canvas>
                                <div class="card-footer">
                                    <small class="text-muted">Meta: 60%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header badge-light-dark">
                                    <h5 class="text-dark">Doenças Crônicas [Hipertensão]</h5>
                                </div>
                                <canvas class="my-4" id="myChart7"></canvas>
                                <div class="card-footer">
                                    <small class="text-muted">Meta: 60%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card badge-light-dark">
                                <div class="card-header bg-dark">
                                    <h5 class="text-white">ISF - Indicador Sintético Final [Previsão]</h5>
                                </div>
                                <canvas class="my-4" id="myChart8"></canvas>
                                <div class="card-footer bg-dark">
                                    <small class="text-white">Meta: 60%</small>
                                </div>
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

<!-- chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

<script>
$(document).ready(function () {
    function makeChart(val01, chartId, color) {
        Chart.types.Doughnut.extend({
            name: "DoughnutTextInside",
            showTooltip: function() {
                this.chart.ctx.save();
                Chart.types.Doughnut.prototype.showTooltip.apply(this, arguments);
                this.chart.ctx.restore();
            },
            draw: function() {
                Chart.types.Doughnut.prototype.draw.apply(this, arguments);

                var width = this.chart.width,
                    height = this.chart.height;

                var fontSize = (height / 114).toFixed(2);
                this.chart.ctx.font = fontSize + "em Verdana";
                this.chart.ctx.textBaseline = "middle";

                var text = val01 + '%',
                    textX = Math.round((width - this.chart.ctx.measureText(text).width) / 2),
                    textY = height / 2;

                this.chart.ctx.fillText(text, textX, textY);
            }
        });

        let val02 = 100 - parseInt(val01);

        var data = [{
            value: val01,
            color: color
        }, {
            value: val02,
            color: "#4D5360"
        }];

        var DoughnutTextInsideChart = new Chart($(chartId)[0].getContext('2d')).DoughnutTextInside(data, {
        responsive: true
        });
    };

makeChart('55', '#myChart1', '#48D1CC')
makeChart('80', '#myChart2', '#48D1CC')
makeChart('30', '#myChart3', '#48D1CC')
makeChart('67', '#myChart4', '#4682B4')
makeChart('72', '#myChart5', '#A52A2A')
makeChart('58', '#myChart6', '#FF8C00')
makeChart('49', '#myChart7', '#FF8C00')
makeChart('61', '#myChart8', '#008000')

});

</script>

</body>

</html>
