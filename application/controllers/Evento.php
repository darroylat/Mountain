<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller{

	public function index(){

	}
  public function ver_eventos(){

  }

	public function crear(){
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;

		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$punto = $this->input->post("punto");
		$ubicacion = $this->input->post("ubicacion");
		//$sendero = $this->input->post("sendero");
		$foto = $this->input->post("foto");
		$fechaevento = $this->input->post("fechaevento");
		$horaevento = $this->input->post("horaevento");
		$fechatermino = $this->input->post("fechatermino");
		$valor = $this->input->post("valor");

		$arrayequipo = $this->input->post("equipo");

		$this->load->model('Evento_model','',$config);
		$evento = $this->Evento_model->insert_evento($nombre, $descripcion, $fecha, $hora, $fechacierre, $valor, $punto, $foto);

		if ($evento) {
			foreach ($arrayequipo as $key) {
				//echo $key.'</br>';
				$idcapture = $this->Evento_model->insert_id();
				$this->load->model('Equipo_model','',$config);
				$this->Equipo_model->insert_equipoevento($key, $idcapture);
			}
		}

	}

}
