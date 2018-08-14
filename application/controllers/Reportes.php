<?php 
	/**
	* 
	*/
	class Reportes extends CI_Controller
	{
		
		function index()
		{
			$data = array();
			$this->load->database();
			$this->load->helper('url');
			$this->load-> model('Reporte_model');
			$data['records'] = $this->Reporte_model->mostrar();
			$this->load->view('reportes.php', $data);
		}

		function Envio()
		{
			$data = array();
			//Se carga la base da datos
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Reporte_model');
			$data['records'] = $this->Reporte_model->mostrar();
			//echo var_dump($data['records']);
			//Carga de la libreria 
			$this->load->library('email');
			
			//Iniciacion de los arreglos vacios 
			$arreglo_mail = array();
			
			//Loop para incidencia y correos
			foreach ($data['records'] as $elemento)
			{
				$arreglo_mail[$elemento->id_reporte]["id_incide"]=$elemento->id_incide;
				$arreglo_mail[$elemento->id_reporte]["tipo_incidencia"]=$elemento->tipo_incidencia;
				$arreglo_mail[$elemento->id_reporte]["sucursal"]=$elemento->sucursal;
				$arreglo_mail[$elemento->id_reporte]["observaciones"]=$elemento->observaciones;
				$arreglo_mail[$elemento->id_reporte]["src"]=$elemento->src;
				$arreglo_mail[$elemento->id_reporte]["correo"][] = $elemento->correo;
			}																						

			foreach ($arreglo_mail as $send_mail)

			$config = array();
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'ssl://smtp.gmail.com';
				$config['smtp_port'] = 465;
				$config['smtp_user'] = 'monitoreo@electrobike.com.mx';
				$config['smtp_pass'] = 'Electrobike.2018';
			

			$this->email->initialize($config);

			{
				$this->email->clear(TRUE);
				$this->email->from('monitoreo@electrobike.com.mx','Monitoreo');
				$this->email->cc($send_mail["correo"]);
				//Asunto
				$this->email->subject("Incumplimiento: Categoría ".$send_mail["id_incide"]." ".$send_mail["tipo_incidencia"]." sucursal ".$send_mail["sucursal"]);

				//Mensaje
				$this->email->message($send_mail["observaciones"]);
				
				//archivos adjuntos
				$this->email->attach('http://electrobike.com.mx/sistemamonitoreo/index.php/uploads/'.$send_mail["src"]);
					
				$this->email->send();   

				//print_r($send_mail["src"]);
				echo "<br><br>Enviando el id ".$send_mail["id_incide"]." a: ";
				//print_r($send_mail["correo"]);
			}
			
			print_r($arreglo_mail);
		
			/*for($i = 0; $i < count($arreglo_mail); $i++)
			{
					$this->email->from('monitoreo@electrobike.com.mx','Monitoreo');
					$this->email->cc($arreglo_mail["correo"]);
				//Asunto
				  $this->email->subject("Incumplimiento: Categoría ".$arreglo_mail[$i]["id_incide"]." ".$arreglo_mail[$i]["tipo_incidencia"]." sucursal ".$arreglo_mail[$i]["sucursal"]);

				//Mensaje
					$this->email->message($arreglo_mail[$i]["observaciones"]);
				
				//archivos adjuntos
					$this->email->attach('http://electrobike.com.mx/sistemamonitoreo/uploads/'.$arreglo_mail[$i]["src"]);
					
					$this->email->send(); 
			}*/

			//Regreso a la pagina de reportes
			$this->db->where('enviado',0);
			$this->db->set('enviado', 1);
			$this->db->update('reportes');
			//UPDATE reportes set enviado = 1 where enviado = 0
			$this->load->view('reportes.php');
		}
	}

 ?>