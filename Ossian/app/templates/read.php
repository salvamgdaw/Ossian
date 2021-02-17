<?php ob_start() ?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal"
	data-bs-target="#createImg">Añadir imagen</button>

<div class="modal fade" id="createImg" tabindex="-1"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form name="home" action="index.php?ctl=create" method="POST">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>
						Título<input type="text" name="titulo" required>
					</p>
					<p>
						Categoría<input type="text" name="categoria" required>
					</p>
					<p>
						Descripción<input type="text" name="descripcion" required>
					</p>
					<p>
						URL<input type="text" name="url" required>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger"
						data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success">Añadir imagen</button>
				</div>
			</div>
		</div>
	</form>
</div>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Imagen</th>
			<th scope="col">Título</th>
			<th scope="col">Categoría</th>
			<th scope="col">Descripción</th>
			<th scope="col">Editar</th>
			<th scope="col">Eliminar</th>
		</tr>
	</thead>
	<tbody>
        <?php foreach ($params["images"] as $image) :?>
    <tr>
			<td><img src="<?php echo $image["url"]?>" width="100px" heigh="100px"></td>
			<td><?php echo $image["titulo"]?></td>
			<td><?php echo $image["categoria"]?></td>
			<td><?php echo $image["descripcion"]?></td>
			<form action="" method="POST">
				<input type="hidden" name="txtTitulo"
					value="<?php echo $image["titulo"]?>"> <input type="hidden"
					name="txtCategoria" value="<?php echo $image["categoria"]?>"> <input
					type="hidden" name="txtDescripcion"
					value="<?php echo $image["descripcion"]?>"> <input type="hidden"
					name="txtUrl" value="<?php echo $image["url"]?>"> <input
					type="hidden" name="txtId" value="<?php echo $image["id"]?>">
			</form>
			<td>
				<button type="button" class="btn btn-success" data-bs-toggle="modal"
					data-bs-target="#edit">Editar</button>

				<div class="modal fade" id="edit" tabindex="-1"
					aria-labelledby="exampleModalLabel" aria-hidden="true">
					<form name="update" action="index.php?ctl=update" method="POST">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<p>
										Título<input type="text" name="updTitulo"
											value="<?php echo $image["titulo"]?>" required>
									</p>
									<p>
										Categoría<input type="text" name="updCategoria"
											value="<?php echo $image["categoria"]?>" required>
									</p>
									<p>
										Descripción<input type="text" name="updDescripcion"
											value="<?php echo $image["descripcion"]?>" required>
									</p>
									<p>
										URL<input type="text" name="updUrl"
											value="<?php echo $image["url"]?>" required>
									</p>
									<input type="hidden" name="txtId"
										value="<?php echo $image["id"]?>">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger"
										data-bs-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-success">Editar imagen</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</td>
			<form name="delete" action="index.php?ctl=delete" method="POST">
				<input type="hidden" name="txtId" value="<?php echo $image["id"]?>">
				<td><button type="submit" class="btn btn-danger">Eliminar</button></td>
			</form>
		</tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>