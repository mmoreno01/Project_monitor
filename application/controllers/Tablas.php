<?php

/**
* 
*/
class Tablas extends CI_Controller
{
	
	function index()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('tablas.php');
	}

	function consulta()
	{
		$data = array();
		if(isset($_POST["Desde"]))
		{
			$inicio = $_POST["Desde"];
			$fin = $_POST["Hasta"];
			//$info= ["inicio" => $inicio, "fin" => $fin];

			$this->load->database();
			$this->load->helper('url');
			$this->load-> model('Consulta_model');
			$incidencias = $this->db->get('incidencias')->result_array();
			$data['incidencias'] = $incidencias;
			$data['records'] = $this->Consulta_model->consulta($inicio,$fin);
			
		}
		$this->load->view('tablas.php', $data);
	}

	function ficheroExcel()
	{
			$inicio = $_POST["s_desde"];
			$fin = $_POST["s_hasta"];
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteIncidencia"." Desde ".$inicio." Hasta ".$fin.".xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			echo $_POST['datos_a_enviar'];
		
	}
}

?>

