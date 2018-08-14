<?php /**
 *
 */
class Registrar extends CI_Controller
{

	function index()
	{
		$this->load->database();
		$this->load->helper('url');
      	$sucursales = $this->db->get('sucursales')->result_array();
      	$incidencias = $this->db->get('incidencias')->result_array();
      	//echo var_dump($sucursales);
      	$data = array();
      	$data['sucursales'] = $sucursales;
      	$data['incidencias'] = $incidencias;
		$this->load->view('registrar.php',$data);
	}

	function agregar()
	{
  		//echo var_dump($_POST);

  		//echo "<br><br>";

  		$this->load->model("registrar_model");
		$this->registrar_model->agregar_reporte(
			$_POST["id_sucursal"],
			$_POST["fecha_y_hora"],
			$_POST["id_incidencia"],
			$_POST["observaciones"]
			);
		redirect(base_url("index.php/registrar"), "refresh");
	}
}

?>
