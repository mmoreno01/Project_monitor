<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registro</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/bootstrap/css/bootstrap-theme.css">
  <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="static/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="static/css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>static/js/dropzone.js"></script>


  <!-- this should go after your </body> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/bootstrap/css/jquery.datetimepicker.css"/ >
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <script src="<?php echo base_url(); ?>static/js/jquery.datetimepicker.full.min.js"></script>
  <script type="text/javascript">


    Dropzone.autoDiscover = false;
    var num_img = 0;
    $(document).ready(function()
    {
      $("#zonadearchivos").dropzone({
        url: "index.php/uploads/",
        addRemoveLinks: true,
        maxFilesize: 10000,
        dictResponseError: "ha ocurrido un error en el server",
        paramName: "file",
        success: function(file, response){
                num_img+=1;
                this.removeFile(file);
                data = JSON.parse(response);
                console.log(data.nombre);
                $("#img_list").append("<div><input type='hidden' name='img_"+num_img+"' value='"+data.nombre+"'><button type='button' class='btn btn-danger' onclick='$(this).parent().remove()'>X</button>"+data.nombre+"</div>");
            }
      });
                jQuery('#datetimepicker').datetimepicker();
    });
  </script>
  <?php include 'static/php/navbar.php' ?>
</head>
<body>
<section id="form-registro">
    <div class="container content-form">
          <div class="row">
              <div class="col-12 content-title">
                    <h1 class="text-center">Alta de Incidencia</h1>
              </div>
          </div>
          <div class="row">
              <form role="form" class="form" action="<?php echo base_url();?>index.php/registrar/agregar" method="post">
                  <div class="col-md-4 form-group">
                      <label for="id_incidencia">
                            <h3>Incidencias:</h3>
                      </label>
                    <select class="form form-control" name="id_incidencia">
                            <?php foreach ($incidencias as $incidencia) 
                            {
                              echo '<option value="'.$incidencia['id_incide'].'">'.$incidencia['nombre'].'</option>';
                            } ?>
                    </select>
                  </div>
                  <div class="col-md-4 form-group">
                        <label for="id_sucursal">
                            <h3>Sucursales:</h3>
                        </label>
                    <select class="form form-control" name="id_sucursal">
                          <?php foreach ($sucursales as $sucursal) {
                          echo '<option value="'.$sucursal['id_sucur'].'">'.$sucursal['nombre'].'</option>';
                          } ?>
                    </select>
                  </div>
                  <div class="col-md-4 form-group">
                      <label for="fecha_y_hora">
                        <h3>Hora del reporte:</h3>
                      </label>
                      <input class="form-control" type="text" name="fecha_y_hora" id="datetimepicker" required>
                  </div>
               </form>
          </div>
          <div class="row">
              <div class="col-md-6 form-group">
                  <div id="zonadearchivos" class="dropzone"></div>
              </div>
              <div class="col-md-6 form-group">
                  <label for="observaciones"><h3>Observaciones:</h3></label>
                  <textarea  class="form-control" name="observaciones" rows="9" cols="80" placeholder="observaciones" required></textarea>
              </div>
          </div>
          <div class="row">
              <div class="col-12 form-group">
                  <button class="btn btn-success btn-lg" type="submit" onclick='alert("Guardado de manera exitosa")'name="enviar" >Guardar</button>
              </div>
          </div>
    </div>
</section>
  <!-- <form role="form" class="form" action="<?php echo base_url();?>index.php/registrar/agregar" method="post">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <table>
              <tr>
                <td>
              <label for="id_incidencia"><h3>Incidencias:</h3></label>
              <select class="form" name="id_incidencia">
                <?php foreach ($incidencias as $incidencia) 
                {
                  echo '<option value="'.$incidencia['id_incide'].'">'.$incidencia['nombre'].'</option>';
                } ?>
                
              </select>
                </td>
              </tr>
              <tr>
                <td>
                <label for="id_sucursal"><h3>Sucursales:</h3></label>
                <select class="form" name="id_sucursal">
                  <?php foreach ($sucursales as $sucursal) {
                  echo '<option value="'.$sucursal['id_sucur'].'">'.$sucursal['nombre'].'</option>';
                  } ?>
                </select>
                </td>
              </tr>
              <tr>
                <td>
                <div>  
                  <label for="fecha_y_hora"><h3>Hora del reporte:</h3></label>
                  <input type="text" name="fecha_y_hora" id="datetimepicker" required>
                </div>
                </td>
              </tr>
              <tr>
                <td>
                  <tr>
                    <td>
                      <div id="zonadearchivos" class="dropzone"></div>
                    </td>
                  </tr>
                </td>
              </tr>
              <tr>
                <td>
                  <div id="img_list">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="observaciones"><h3>Observaciones:</h3></label>
                  <div>
                  <textarea name="observaciones" rows="9" cols="80" placeholder="observaciones" required></textarea>
                  </div>  
                </td>
              </tr>
              <tr>
                <td>
                  <center><button class="btn btn-success btn-lg" type="submit" onclick='alert("Guardado de manera exitosa")'name="enviar" >Guardar</button></center>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form> -->
</body>
</html>
