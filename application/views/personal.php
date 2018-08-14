<!DOCTYPE html>
<html>
<head>
	<title>Personal</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap-theme.css">
  <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>static/js/dropzone.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/bootstrap/css/jquery.datetimepicker.css"/ >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <script src="<?php echo base_url(); ?>static/js/jquery.datetimepicker.full.min.js"></script>
	<!-- Modificación de estilos en imagen -->
	<style type="text/css">
		h4 {
			font-family: sans-serif;
			color: gray;
			}
		img {
			border: 5px solid #28B463;
    		border-radius: 4px;
    		padding: 5px;
    		width: 150px;
			}
		th{
			padding-top: 55px;
		}
	</style>
	<!-- DateTimePicker JS -->
	  <script type="text/javascript">
    Dropzone.autoDiscover = false;
    $(document).ready(function()
    {
		jQuery('#Entrada').datetimepicker({
			formatdate: 'y/m/d',
			formattime:'H:i', //no olvidar que el formato influye el la consulta a MYSQL
			inline:false,
			lang:'es'
		});
		jQuery('#Salida').datetimepicker({
			formatdate: 'y/m/d',
			formattime:'H:i', //no olvidar que el formato influye el la consulta a MYSQL
			inline:false,
			lang:'es'

      });
	}
     	);
    </script>
        <script type="text/javascript">
		$(document).ready(function(){
			
			$("input[type=submit]").click(function() {
				var accion = $(this).attr('dir');
				$('form').attr('action', accion);
				$('form').submit();
			});
			
		});
	</script>


	<?php include 'static/php/navbar.php' ?>
</head>
<body>
	<form role="form" class="form" action="<?php echo base_url();?>index.php/Personal/consulta" method="post">
	<div class="container">
		<center>
		<table>
		<td>
			<label>Elegir sucursal</label>
			<select name="sucursal">
				<?php foreach ($sucursales as $sucursal) {
			 	echo '<option value="'.$sucursal['id_sucur'].'">'.$sucursal['nombre'].'</option>';}
				?>
			</select>
		</td>
		</table>
			<button class="btn btn-success" >Consultar</button>
		</center>
	</div>
	</form>	

	<?php if(isset($records)) { ?>
		<div class="container">
		<?php switch ($_POST['sucursal']) {
			case '1':?>
				<table class="table table-inverse">
				<th colspan="9"><center><h1>Condesa</h1></center></th>
				<tr></tr>
				<td>
				<img src="<?php echo base_url();?>perso_ima/Condesa_Diego_Moreno_Gerente.jpeg" style="width:128px;height:128px;">
				</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				<tr>
					<td>
					<img src="<?php echo base_url();?>perso_ima/Condesa_Cristian_Oxte_Vendedor.jpeg" style="width:128px;height:128px;">
					</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				</tr>
				<tr>
					<td>
					<img src="<?php echo base_url();?>perso_ima/Condesa_Nathanael_Vendedor.jpg" style="width:128px;height:128px;">
					</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				</tr>
				</table>
		<?php break; ?>
			
			<?php case '2': ?>
				OAXACA
			<?php break; ?>
			
			<?php case '3':?>
				Puebla
			<?php break; ?>
			
			<?php case '4':?>
				Guadalajara
			<?php break; ?>
			
			<?php case '5':?>
				<table class="table table-inverse">
				<th class="thead-inverse" colspan="9"><center>Insurgentes</center></th>
				<tr></tr>
				<td>
				<img src="<?php echo base_url();?>perso_ima/Insurgentes_Alain_Mesa_Gerente.jpeg" style="width:128px;height:128px;">	
				</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				<tr>
					<td>
					<img src="<?php echo base_url();?>perso_ima/Insurgentes_Gabriel_Vendedor.jpeg" style="width:128px;height:128px;">
					</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				</tr>
				</table>
			<?php break; ?>
			
			<?php case '6':?>
				<table class="table table-inverse">
				<th colspan="9"><center>Narvarte</center></th>
				<tr></tr>
				<td>
				<img src="<?php echo base_url();?>perso_ima/Narvarte_Eduardo_Montoya_Gerente.jpeg" style="width:128px;height:128px;">
				</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				<tr>
					<td>
					<img src="<?php echo base_url();?>perso_ima/Narvarte_Lorena_Garcia_Vendedor.jpeg" style="width:128px;height:128px;">
					</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				</tr>
				</table>
			<?php break; ?>
			
			<?php case '7':?>
				<table class="table table-inverse">
				<th class="thead-inverse" colspan="9"><center>Polanco</center></th>
				<tr></tr>
				<td>
				<img src="<?php echo base_url();?>perso_ima/Polanco_Adan_Hernandez_Vendedor.jpeg" style="width:128px;height:128px;">
				</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				<tr>
					<td>
					<img src="<?php echo base_url();?>perso_ima/Polanco_Sergio_Maya_Gerente.jpeg" style="width:128px;height:128px;">
					</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				</tr>
				</table>
			<?php break; ?>
			
			<?php case '8':?>
				<table class="table table-inverse">
				<th colspan="9"><center>Filadelfia</center></th>
				<tr></tr>
				<td>
				<img src="<?php echo base_url();?>perso_ima/Wtc_Adrian_Miranda_Gerente.jpeg" style="width:128px;height:128px;">
				</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				<tr>
					<td>
					<img src="<?php echo base_url();?>perso_ima/Wtc_Alan_Vendedor.jpeg" style="width:128px;height:128px;">
					</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				</tr>
				<tr>
					<td>
					<img src="<?php echo base_url();?>perso_ima/Wtc_Ricardo_Merino_Vendedor.jpeg" style="width:128px;height:128px;">
					</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				</tr>
				<tr>
					<td>
					<img src="<?php echo base_url();?>perso_ima/Wtc_Roberto_Vendedor.jpeg" style="width:128px;height:128px;">
					</td>
					<td>
						<label for="Entrada"><h4>Entrada:</h4></label>
						<input type="text" name="Entrada" id="Entrada" required>
					</td>
					<td>
						<label for="Salida"><h4>Salida:</h4></label>
						<input type="text" name="Salida" id="Salida" required>
					</td>
				</tr>
				</table>
			<?php break; ?>
			
			<?php case '9':?>
				Sherman Oaks
			<?php break; ?>
			
			<?php case '10':?>
				Queretaro
			<?php break; ?>
			
			<?php default:
				echo $_POST['sucursal'];
				echo "vamos mal";
				break;
		} ?>	
		</div>
	<?php } ?>
</body>
</html>
