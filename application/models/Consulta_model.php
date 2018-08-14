<?php 
class Consulta_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function consulta($inicio,$fin)
	{
		$inicio = explode(" ",$inicio)[0];
		$fin = explode(" ",$fin)[0];
		$q= "
			SELECT
			sucursales.id_sucur,
			sucursales.nombre,
			SUM(IF(id_incide = 1,1,0)) AS Apertura_Tardia,
			SUM(IF(id_incide = 2,1,0)) AS Cierre_Temprano,
			SUM(IF(id_incide = 3,1,0)) AS Cerrado_Todo_El_Dia,
			SUM(IF(id_incide = 4,1,0)) AS Uniforme,
			SUM(IF(id_incide = 5,1,0)) AS Celular,
			SUM(IF(id_incide = 6,1,0)) AS No_Atención_en_cinco_seg,
			SUM(IF(id_incide = 7,1,0)) AS Conducta_Inapropiada,
			SUM(IF(id_incide = 8,1,0)) AS Video,
			COUNT(id_incide) as total

			FROM reportes

			INNER JOIN incidencias ON reportes.id_incidencia = incidencias.id_incide
			INNER JOIN sucursales on sucursales.id_sucur = reportes.id_sucursal

			WHERE
			reportes.id_incidencia >= 0
			AND DATE(fecha_y_hora) >= '".$inicio."' AND DATE(fecha_y_hora) <= '".$fin."'

			GROUP BY id_sucur
			";
		//echo $q;
			//echo $inicio."<br>";
			//echo $fin;
		$query = $this->db->query($q);
		return $query->result();
	}


	// SELECT sucursales.id_sucur, sucursales.nombre, SUM(IF(id_incide = 1,1,0)) AS uniforme, SUM(IF(id_incide = 2,1,0)) AS apertura, SUM(IF(id_incide = 3,1,0)) AS cierre, COUNT(id_incide) as total FROM reportes INNER JOIN incidencias ON reportes.id_incidencia = incidencias.id_incide INNER JOIN sucursales on sucursales.id_sucur = reportes.id_sucursal WHERE reportes.id_incidencia >= 0 AND fecha_creacion BETWEEN '20161222' AND '20161228' GROUP BY id_sucur 

}
/* 14 - 18 todo existe */

/*
SELECT  reportes.id_reporte,
sucursales.nombre as sucursal, 
incidencias.nombre as tipo_incidencia,
reportes.fecha_y_hora,
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
ORDER BY `reportes`.`id_reporte` ASC
*/

/*
UPDATE reportes 
SET enviado = 1 
WHERE enviado = 0
*/