<?php 
class Anuncios{

	public function getMeusAnuncios() {
		global $pdo;

		$array = array();
		$sql = $pdo->prepare("SELECT *, (select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_usuario = anuncios.id limit 1) as url FROM anuncios WHERE id_usuario = :id_usuario");
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function addAnuncios($categoria, $titulo, $valor, $descricao, $estado) {
		global $pdo;

		$sql = $pdo->prepare("INSERT INTO anuncios SET id_categoria = :id_categoria, titulo = :titulo, valor = :valor, descricao = :descricao, estado = :estado, id_usuario = :id_usuario");
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->execute();

	}


}