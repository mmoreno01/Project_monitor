<?php 
	/**
	* 
	*/
	class Reporte_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function mostrar()
			{
				$q=
				"SELECT  reportes.id_reporte,
				incidencias.id_incide,
				reportes.observaciones,
				sucursales.nombre as sucursal, 
				incidencias.nombre as tipo_incidencia,
				reportes.fecha_y_hora,
				destinatarios.nombre,
				destinatarios.correo,
				imagenes.src
				from reportes 
				INNER JOIN incidencias 
				ON reportes.id_incidencia = incidencias.id_incide 
				INNER JOIN sucursales 
				on sucursales.id_sucur = reportes.id_sucursal  
				INNER JOIN link_suc_dest
				on sucursales.id_sucur = link_suc_dest.id_sucur
				INNER JOIN destinatarios
				on link_suc_dest.id_destin = destinatarios.id_destin
				iNNer JOIN imagenes
				ON reportes.id_reporte = imagenes.id_reporte
				WHERE reportes.enviado = 0
				ORDER BY `reportes`.`id_reporte` ASC";
				//echo $q;
				//echo $inicio."<br>";
				//echo $fin;
				$query = $this->db->query($q);
				return $query->result();
			}
	}

 ?>