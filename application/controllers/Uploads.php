<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends CI_Controller {

	public function index()
	{
    $data = array("status"=>0);
    $dir_subida = 'uploads/';
    $fichero_subido = $dir_subida . basename($_FILES['file']['name']);
    $data["nombre"]= basename($_FILES['file']['name']);
    $nombre_unico = false;
    $x = 0;
    while(!$nombre_unico)
    {
      $x++;
      if(file_exists($fichero_subido))
      {
        $fichero_subido = $dir_subida .$x."_". basename($_FILES['file']['name']);
        $data["nombre"]=$x."_". basename($_FILES['file']['name']);
      }
      else
      {
        $nombre_unico = true;
      }
    }
    if (move_uploaded_file($_FILES['file']['tmp_name'], $fichero_subido)) {
      $data["status"]=1;
    }
    echo json_encode($data);
  }
}
