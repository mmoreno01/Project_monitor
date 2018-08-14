<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap-theme.css">
  <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>static/js/dropzone.js"></script>
  <!-- this should go after your </body> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/bootstrap/css/jquery.datetimepicker.css"/ >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <script src="<?php echo base_url(); ?>static/js/jquery.datetimepicker.full.min.js"></script>
	<title>Sucursales</title>
</head>
  <?php include 'static/php/navbar.php' ?>
<body>
  <h1> <center>Sucursales</center></h1>
   <form role="form" class="form" action="<?php echo base_url();?>index.php/registrar/agregar" method="post">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <table>

	<?php foreach ($sucursales as $sucursal) {
                  echo '<option value="'.$sucursal['id_sucur'].'">'.$sucursal['nombre'].'</option>';
                  } ?>

 
            
</body>
</html>