<?php require 'config.php';?>
<?php 
	if (empty($_SESSION['cLogin'])) {
			
	} else {
		require 'classes/usuarios.class.php';
		$u = new Usuarios();
		$users = $u->getUsuarios();

		foreach ($users as $usr) {
			$nome = $usr['nome'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Classificados</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="./">Classificados</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">

				<?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
					<a class="nav-item nav-link" href="meus-anuncios.php">Meus Anúncios</a>
					<form class="form-inline my-2 my-lg-0">
						<label class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">Bem Vindo
						<?php
						echo $nome;
						?>
						</label>
					</form>
					<a class="nav-item nav-link" href="sair.php">Sair</a>
				<?php else: ?>
					<a class="nav-item nav-link" href="cadastre-se.php">Cadastre-se</a>
					<a class="nav-item nav-link" href="login.php">Login</a>
				<?php endif; ?>
			</div>
		</div>
	</nav>