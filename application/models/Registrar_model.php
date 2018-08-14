<?php 
class Registrar_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function agregar_reporte($id_sucursal,$fecha_y_hora,$id_incidencia,$observaciones)
	{
		$data = array(
			'id_sucursal' => $id_sucursal,
			'fecha_y_hora' => $fecha_y_hora,
			'id_incidencia' => $id_incidencia,
			'observaciones' => $observaciones
			);
		
		$this->db->insert('reportes',$data);

		$data= array();

		$data['id_reporte']=$this->db->insert_id();

		foreach($_POST as $key => $value) {
			if ('img_' == substr($key, 0,4)){
		  		//echo "POST parameter '$key' has '$value'";
		  		$data['src']=$value;
		  		$this->db->insert('imagenes',$data);		
			}
		}
	}

}
