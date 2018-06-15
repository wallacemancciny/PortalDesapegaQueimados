<?php  
// Criando a classe usuarios.
Class Usuarios {
//criando a função cadastrar
	public function cadastrar($nome, $email, $senha, $telefone) {
//para cadastrar um usuario no banco, é necessário verificar se o usuario já existe.
//verificando se a tabela usuarios já possui o e-mail digitado no form.
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

//se a busca pelo usuario não trouxer nada, então ele vai fazer o insert no banco.
		if ($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
			
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":telefone", $telefone);
			$sql->execute();

			return true;

		} else {
//se essa rotina não conseguir gravar no banco, vai retornar falso.
			return false;
		}


	}
//ainda dentro da classe usuários, criando a funcao de fazer login
	public function login($email, $senha) {
		global $pdo;
		//fazendo select no banco pra achar algum usuario que tem e-mail e senha corretos
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email",$email);
		$sql->bindValue(":senha",md5($senha));
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			return true;
		}else {
			return false;
		}
	}
	//listar todos os dados do usuário
	public function getUsuarios() {
		global $pdo;
		$array = array();
		$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", $_SESSION['cLogin']);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

}
?>