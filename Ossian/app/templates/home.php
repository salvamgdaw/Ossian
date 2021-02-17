<?php ob_start() ?>
<h1><?php echo $params["msj"];?></h1>
<form name="home" action="index.php?ctl=read" method="POST">
	<button type="submit" class="btn btn-primary">Listar Imágenes</button>
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>