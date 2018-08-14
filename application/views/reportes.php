<!DOCTYPE>
<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap-theme.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<title>Envio Reportes</title>

	 <?php include 'static/php/navbar.php' ?>
</head>
<body>
<h1><center>Reportes para Envio</center></h1>
	<div class="container">
		<?php if(isset($records)) { ?>
			<center>
				<table class="table table-condensed table-striped">
					<thead><tr>
					<td></td>
					<td>sucursal</td>
					<td>incidencia</td>
					<td>fecha Incidencia</td>
					<td>Destinatario Correo</td>
					</tr></thead>
					<?php  
						foreach ($records as $rec)
						{
							echo "<tr>"."<td>".$rec->id_reporte."</td>"."<td>".$rec->sucursal."</td>".
							"<td>".$rec->tipo_incidencia." </td><td>".$rec->fecha_y_hora."</td>".
							"<td>".$rec->correo."</td></tr>";
						}
					?>
				</table>
			</center>
		<?php } ?>
	</div>

	<form role="form" class="form" action="<?php echo base_url();?>index.php/Reportes/Envio">
		<div class="container">
			<div class="row">
				<center>
					<button class="btn btn-success btn-lg" type="submit" name="enviar">Enviar a correo</button>
				</center>
			</div>
		</div>
	</form>
</body>
</html>