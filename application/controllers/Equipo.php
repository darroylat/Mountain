<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller{

	public function index(){
		
		
			$data['contenido'] = 'mountain/contenido/equipamiento_nuevo';
			$data['encabezado'] = 'mountain/encabezado';
			$data['menu'] = 'mountain/menu';
	    	$data['title'] = 'Mountain';
	
			$this->load->view('template_mountain',$data);
	}
	public function ver_equipos()
	{
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$this->load->model('Equipo_model','',$config);/* cargamos modelo con query*/
		$all_equipo=$this->Equipo_model->all_equipo();/*Ejecujatamos la query*/
		
		$consulta["all_equipo"]=$all_equipo;
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/equipo_ver';
		$data['datos'] = $consulta;
		
		$this->load->helper('url');
		$this->load->view('template_mountain', $data);
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
    $descripcion = $this->input->post("descripcion");
    $volver = $this->input->post("volver");

    //TODO terminar agregar equipamiento
    //echo $nombre.' '.$descripcion;
    $this->load->model('Equipo_model','',$config);
    $query = $this->Equipo_model->insert_equipamiento($nombre, $descripcion);

		if ($query) {
			if (isset($volver)) {
	      redirect('/administracion/equipamiento/nuevo');
	    }else{
	      redirect('/administracion');
	    }
		}else{
			redirect('/administracion');
		}
	 }
	public function borrar(){
		echo $this->session->userdata('basedatos');
	}
}
