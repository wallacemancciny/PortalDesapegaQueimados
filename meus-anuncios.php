<?php require 'pages/header.php'; ?>
<?php 
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}
?>

<div class="container">
	<h1>Meus Anúncios</h1>

	<a href="add-anuncio.php" class="btn btn-primary">Adicionar Anúncios</a>
	<hr>
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Título</th>
      <th scope="col">Valor</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    require 'classes/anuncios.class.php';
    $a = new Anuncios();
    $anuncios = $a->getMeusAnuncios();

    foreach ($anuncios as $anuncio) {
    	?>
    	<td><img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" border="0" /></td>
    	<td><?php echo $anuncio['titulo']; ?></td>
    	<td><?php echo number_format($anuncio['valor'], 2); ?></td>
    	<td></td>
    	<?php
    }
    ?>
    </tr>
  </tbody>
</table>
</div>

<?php require 'pages/footer.php';  ?>