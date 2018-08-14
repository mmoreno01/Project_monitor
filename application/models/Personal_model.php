<?php 
/**
* 
*/
class Personal_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function consulta($suc)
	{
		$suc =  explode(" ", $suc)[0];
		$q= "
		SELECT * FROM `personal`
		";
		$query = $this->db->query($q);
		return $query->result();
	}

}
 ?>