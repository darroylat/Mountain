<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendero extends CI_Controller{

	public function index(){

		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		
		$this->load->model('Ubicacion_model','',$config);
		$this->load->model('Sendero_model','',$config);
		$ubicacion = $this->Ubicacion_model->all_ubicacion();
		$nivel = $this->Sendero_model->all_dificultad();
		if ($ubicacion != FALSE) {
			$consultas['ubicacion'] = $ubicacion;
		}
		if ($nivel != FALSE) {
			$consultas['nivel'] = $nivel;
		}
		$data['datos'] = $consultas;
		$data['contenido'] = 'mountain/contenido/sendero_nuevo';
		
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
  public function ver_senderos()
	{
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$this->load->model('Sendero_model','',$config);/* cargamos modelo con query*/
		$listasenderos=$this->Sendero_model->listasenderos();/*Ejecujatamos la query*/
		
		$consulta["listasenderos"]=$listasenderos;
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/sendero_ver';
		$data['datos'] = $consulta;
		
		$this->load->helper('url');
		$this->load->view('template_mountain', $data);
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
		$this->load->model('Sendero_model','',$config);

    $id = $this->input->post("id");
    $senderos = $this->Sendero_model->sendedorsdelugar($id);
	    if(count($senderos)>0)
	    {
	    	$pro_select_box ='';
	    	$pro_select_box .='<option value="0">Seleccionar Sendero</option>';
	    	foreach($senderos as $sendero){
	    		$pro_select_box .='<option value="'.$sendero->IDSENDERO.'">'.$sendero->NOMBRE.'</option>';
	    	}
	    	echo json_encode($pro_select_box);
	    }
    
    
  }
}
