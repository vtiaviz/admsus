<!DOCTYPE html>
<html lang="pt-br">

<head>

	@include('includes.head') 

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Login</h4>
						<div class="form-group mb-3">
							<label class="floating-label" for="User">Usuário</label>
							<input type="text" class="form-control" id="User" placeholder="">
						</div>
						<div class="form-group mb-4">
							<label class="floating-label" for="Password">Senha</label>
							<input type="password" class="form-control" id="Password" placeholder="">
						</div>
						<button class="btn btn-block btn-primary mb-4">Entrar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>


</body>

</html>
