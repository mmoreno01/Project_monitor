<?php 
	
	/**
	* 
	*/
	class Personal extends CI_Controller
	{
		
		function index()
		{
			$this->load->database();
			$this->load->helper('url');
			$sucursales = $this->db->get('sucursales')->result_array();
			$data = array();
			$data['sucursales'] = $sucursales;
			$this->load->view('personal.php',$data);
		}

		function consulta()
		{
			//echo var_dump($_POST);
			$data = array();
			{
				$this->load->database();
				$this->load->helper('url');
				$this->load->model('Personal_model');
				$sucursales = $this->db->get('sucursales')->result_array();
				$suc = $this->input->post("sucursales", true);
				$data['sucursales'] = $sucursales;
				$data['records'] = $this->Personal_model->consulta($suc);
			}
			$this->load->view('personal.php',$data);
		}
	}


 ?>