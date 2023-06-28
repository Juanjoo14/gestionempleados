<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<title>Departamentos</title>
</head>

<body style="background-image: url('img/bg2.jpg');">
	<div class="container text-center p-4">
		<div class="row py-3">
			<div class="col">
				<h1 class="h1">Departamentos</h1>
			</div>
		</div>
		<div class="row py-2">
			<div class="col-4">
				<a href="index.php?action=crearDepartamento" class="btn btn-success">Nuevo departamento</a>
			</div>
		</div>

		<div class="row justify-content-center py-3">
			<div class="col-10">
				<table class="table">
					<thead>
						<tr class="text-start">
							<th scope="col">Nombre</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($departamentos as $dep) { ?>
							<tr>
								<td class="text-start"><?php echo $dep['Nombre']; ?></td>
								<td class="text-end">
									<div class="d-flex justify-content-end">
										<a href="index.php?id=<?php echo $dep['ID']; ?>&action=actualizarDepartamento" class="btn btn-warning me-2">Actualizar</a>
										<a href="index.php?id=<?php echo $dep['ID']; ?>&action=eliminarDepartamento" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar <?php echo $dep['Nombre'] ?>?')">Eliminar</a>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>