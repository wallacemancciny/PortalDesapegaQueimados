<?php require 'pages/header.php'; ?>

<div class="container">
	<h1>Cadastre-se</h1>

	<?php
	require 'classes/usuarios.class.php';
	$u = new Usuarios();
	//Se algo for digitado no campo "nome" e não estiver vazio.
	if (isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$telefone = addslashes($_POST['telefone']);
		//se campo nome e-mail e senha estiverem preenchidos.
		if (!empty($nome) && !empty($email) && !empty($senha)) {
			if ($u->cadastrar($nome, $email, $senha, $telefone)) {
				?>
				<div class="alert alert-success" role="alert">
					Cadastramento efetuado com sucesso! <a href="login.php" class="alert-link">Faça Login Agora!</a>
				</div>
				<?php
				
			} else {
				?>
				<div class="alert alert-warning" role="alert">
					Esse usuário já existe! <a href="login.php" class="alert-link">Faça Login Agora!</a>
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-warning" role="alert">
				Preencha todos os campos!
			</div>
			<?php
		}
																
	}
	
	?>

	<form method="POST">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="text" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" class="form-control">
		</div>
		<div class="form-group">
			<label for="telefone">Telefone:</label>
			<input type="text" name="telefone" class="form-control">
		</div>
		<input type="submit" value="Cadastrar" class="btn btn-default">
	</form> 
</div>

<?php require 'pages/footer.php';  ?>