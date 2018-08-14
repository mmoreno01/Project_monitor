<?php 
/**
* 
*/
class Sucursales extends CI_Controller
{
	
	function index()
	{
		$data = array();
		$this->load->database();
		$this->load->helper('url');
		$sucursales = $this->db->get('sucursales')->result_array();
		$data['sucursales'] = $sucursales;
		$this->load->view('sucursales',$data);

	}
}