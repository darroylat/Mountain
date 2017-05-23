<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicacion extends CI_Controller{

	public function index(){

	}

	public function agregar(){
		$config['hostname'] = 'localhost';
    $config['username'] = 'root';
    $config['password'] = '';
    $config['database'] = $this->session->userdata('basedatos');
    $config['dbdriver'] = 'mysqli';
    $config['dbprefix'] = '';
    $config['pconnect'] = FALSE;
    $config['db_debug'] = TRUE;

		$nombre = $this->input->post("nombre");
		$foto = $this->input->post("foto");
		$caracteristica = $this->input->post("caracteristica");
		$informacion = $this->input->post("informacion");
		$riesgo = $this->input->post("riesgo");
		$utiles = $this->input->post("utiles");
		$equipamiento = $this->input->post("equipamiento");
		$recomendacion = $this->input->post("recomendacion");
		$costo = $this->input->post("costo");
		$ruta = $this->input->post("ruta");

		$this->load->model('Ubicacion_model','',$config);

		$query = $this->Ubicacion_model->insert_ubicacion($nombre, $caracteristica, $informacion, $riesgo, $utiles,
																											$equipamiento, $recomendacion, $costo, $ruta);
		if ($query) {
			redirect('/administracion');
		}
	}
}
