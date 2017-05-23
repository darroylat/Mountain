<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller{

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
