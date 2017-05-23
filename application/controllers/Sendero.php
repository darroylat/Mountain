<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendero extends CI_Controller{

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

    $ubicacion = $this->input->post("ubicacion");
		$nombre = $this->input->post("nombre");
		$nivel = $this->input->post("nivel");
		$descripcion = $this->input->post("descripcion");
    $volver = $this->input->post("volver");

    $this->load->model('Sendero_model','',$config);
		$sendero = $this->Sendero_model->insert_sendero($ubicacion, $nombre, $nivel, $descripcion);
    if ($sendero) {
      if (isset($volver)) {
        redirect('/administracion/sendero/nuevo');
      }else{
        redirect('/administracion');
      }
    }else{
      redirect('/administracion');
    }
  }
  public function mostrar(){
    $config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;

    $id = $this->input->post("id");
  }
}
