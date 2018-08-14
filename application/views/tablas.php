<!DOCTYPE>
<html>
<head>

  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap-theme.css">
  <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>static/js/dropzone.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/bootstrap/css/jquery.datetimepicker.css"/ >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <script src="<?php echo base_url(); ?>static/js/jquery.datetimepicker.full.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function()
  	{
		$(".botonExcel").click(function(event)
		{
			$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
			$("#FormularioExportacion").submit();
		});
	});
  </script>
  <script type="text/javascript">
    Dropzone.autoDiscover = false;
    $(document).ready(function()
    {
    $.datetimepicker.setLocale('es');
		jQuery('#Desde').datetimepicker({
		 mask:true, 
		 format:'Y/m/d',//no olvidar que el formato influye el la consulta a MYSQL
			inline:false,
			lang:'es'
		});
		jQuery('#Hasta').datetimepicker({
		mask:true,
		format:'Y/m/d',
		inline:false,
		lang:'es'

      });
	});
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
	<form role="form" class="form" action="<?php echo base_url();?>index.php/Tablas/consulta" method="post">
		 <div class="container">  
		 	<div class="row">
					<div class="col-md-4 col-md-offset-2">	
			                  <label for="Desde"><h3>Fecha Ini:</h3></label>
			                  <input type="text" name="Desde" id="Desde" required>
		            </div>
				 	<div class="col-md-4">
			                  <label for="Hasta"><h3>Fecha fin:</h3></label>
			                  <input type="text" name="Hasta" id="Hasta" required>
				 	</div>
		 		</div>	
					<div class="row">
						<div class="col-md-4 col-md-offset-5">
			           		<button class="btn btn-success btn-lg" type="submit" name="Consulta">Consultar</button>
			           	</div>
			        </div>
		 	</div>
	</form>

	<?php if(isset($records)) { ?>
	<center>
		<div class="col-md-2">
				<h3><?php echo "Desde:" .$_POST['Desde']; ?></h3>
		</div>
		<div class="col-md-offset-6">
				<h3><?php echo "Hasta:" .$_POST['Hasta']; ?></h3>
		</div>
		<table id="Exportar_a_Excel" class="table">
			<thead>
			<tr>
			<td></td>
			<td>sucursales</td>
			<?php foreach ($incidencias as $incidencia) {
			echo '<td>'.$incidencia['nombre'];
			} ?>
			<td>total</td>
			</tr>
			</thead>
	</center>
		<?php 
		$sumado=0;
		$sumado1=0;
		$sumado2=0;
		$sumado3=0;
		$sumado4=0;
		$sumado5=0;
		$sumado6=0;
		$sumado7=0;

			foreach ($records as $rec)
			{
				echo "<tr>"."<td>".$rec->id_sucur."</td>"."<td>".$rec->nombre."</td>".
				"<td>".$rec->Apertura_Tardia."</td>".
				"<td>".$rec->Cierre_Temprano."</td>".
				"<td>".$rec->Cerrado_Todo_El_Dia."</td>".
				"<td>".$rec->Uniforme."</td>".
				"<td>".$rec->Celular."</td>".
				"<td>".$rec->No_Atención_en_cinco_seg."</td>".
				"<td>".$rec->Conducta_Inapropiada."</td>".
				"<td>".$rec->Video."</td>".
				"<td>".$rec->total."</td></tr>";
			}
			foreach ($records as $rec) 
			{
				$rec->Apertura_Tardia. "<br />"; 
				$sumado += $rec->Apertura_Tardia;
				$rec->Cierre_Temprano."<br/>";
				$sumado1 += $rec->Cierre_Temprano;
				$rec->Cerrado_Todo_El_Dia. "<br/>";
				$sumado2 += $rec->Cerrado_Todo_El_Dia;
				$rec->Uniforme. "<br/>";
				$sumado3 += $rec->Uniforme;
				$rec->Celular. "<br/>";
				$sumado4 += $rec->Celular;
				$rec->No_Atención_en_cinco_seg. "<br/>";
				$sumado5 += $rec->No_Atención_en_cinco_seg;
				$rec->Conducta_Inapropiada. "<br/>";
				$sumado6 += $rec->Conducta_Inapropiada;
				$rec->Video. "<br/>";
				$sumado7 += $rec->Video;
			}
				echo "<tr>"."<td>".""."</td>"."<td>".""."</td>".
				"<td>".$sumado." </td>".
				"<td>".$sumado1."</td>".
				"<td>".$sumado2."</td>".
				"<td>".$sumado3."</td>".
				"<td>".$sumado4."</td>".
				"<td>".$sumado5."</td>".
				"<td>".$sumado6."</td>".
				"<td>".$sumado7."</td>".
				"<td>".""."</td></tr>";
		?>
		</table>
		<form method="post" id="FormularioExportacion" action="<?php echo base_url();?>index.php/Tablas/ficheroExcel">

		<center><button class="btn botonExcel btn-success btn-lg">Descargar</button></center>
		<input type="hidden" name="datos_a_enviar" id="datos_a_enviar"/>

		<input type="hidden" name="s_desde" id="s_desde" value=<?php echo "" .$_POST['Desde'] ?>/>

		<input type="hidden" name="s_hasta" id="s_hasta" value=<?php echo "" .$_POST['Hasta']?>/>
	</form>
	<?php } ?>
	

</body>
</html>