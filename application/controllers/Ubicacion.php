<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicacion extends CI_Controller{

	public function index(){

		$data['contenido'] = 'mountain/contenido/lugar_nuevo';
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
    	$data['title'] = 'Mountain';

		$this->load->view('template_mountain',$data);
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
	public function ver_lugares()
	{
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$this->load->model('Ubicacion_model','',$config);/* cargamos modelo con query*/
		$listalugares=$this->Ubicacion_model->listalugares();/*Ejecujatamos la query*/
		
		$consulta["listalugares"]=$listalugares;
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/lugar_ver';
		$data['datos'] = $consulta;
		
		$this->load->helper('url');
		$this->load->view('template_mountain', $data);
	}
}
