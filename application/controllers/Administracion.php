<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller{

	public function __construct(){
        parent::__construct();
				if(!is_logged_in()){  // if you add in constructor no need write each function in above controller.
         redirect('/principal');
        }
  }

	public function index()
	{
		//$data['contenido'] = 'ruta a la vista dinamica';
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/contenido_dashboard';
    $data['title'] = 'Mountain';
    //$data['title'] = $title['title'] = 'Mountain';

		//$this->load->view('header');
    $this->load->helper('url');
		$this->load->view('template_mountain',$data);
		//$this->load->view('footer');
	}
  public function empy_page()
	{
		//$data['contenido'] = 'ruta a la vista dinamica';
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/contenido_empy';
    $data['title'] = 'Mountain';
    //$data['title'] = $title['title'] = 'Mountain';

		//$this->load->view('header');
    $this->load->helper('url');
		$this->load->view('template_mountain',$data);
		//$this->load->view('footer');
	}

  public function chart()
	{
		//$data['contenido'] = 'ruta a la vista dinamica';
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/contenido_chart';
    $data['title'] = 'Mountain';
    //$data['title'] = $title['title'] = 'Mountain';

		//$this->load->view('header');
    $this->load->helper('url');
		$this->load->view('template_mountain',$data);
		//$this->load->view('footer');
	}
	public function lugar($parametro){

		if ($parametro == 'nuevo') {
			$data['contenido'] = 'mountain/contenido/lugar_nuevo';
		}elseif ($parametro == 'ver') {
			$data['contenido'] = 'mountain/contenido/lugar_ver';
		}else {
			//TODO proximo 404 para la pagina de administracion
		}
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
    $data['title'] = 'Mountain';

		$this->load->view('template_mountain',$data);
	}
	public function evento($parametro){

		if ($parametro == 'nuevo') {
			$data['contenido'] = 'mountain/contenido/evento_nuevo';
		}elseif($parametro == 'ver'){
			$data['contenido'] = 'mountain/contenido/evento_ver';
		}else{
			//TODO proximo 404 para la pagina de administracion
			//$data['contenido'] = 'mountain/contenido/evento_ver';
		}
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
    $data['title'] = 'Mountain';

		$this->load->view('template_mountain',$data);
	}
	public function sendero($parametro){

		if ($parametro == 'nuevo') {
			$data['contenido'] = 'mountain/contenido/sendero_nuevo';
		}else{
			# code...
		}
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
    $data['title'] = 'Mountain';

		$this->load->view('template_mountain',$data);
	}
	public function equipamiento($parametro){

		if ($parametro == 'nuevo') {
			$data['contenido'] = 'mountain/contenido/equipamiento_nuevo';
		}else{
			# code...
		}
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
    $data['title'] = 'Mountain';

		$this->load->view('template_mountain',$data);
	}

	public function cliente(){

		$this->load->model('Admin_model');
		$id = $this->session->userdata('id');
		$query = $this->Admin_model->get_where_one($id);

		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/cliente_datos';
		$data['modal_contrasena'] = 'mountain/modal/modal_cambio_contrasena';

		$cliente['nombre'] = $query['nombrecliente'];
		$cliente['email'] = $query['mailcliente'];
		$cliente['recibir'] = $query['recibircliente'];

		$data['datos'] = $cliente;

		$this->load->view('template_mountain',$data);
	}

	public function bienvenido(){

		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/bienvenido';

		$this->load->view('template_mountain',$data);
	}

	public function pack($parametro){
		if ($parametro == 'nuevo') {
			$data['contenido'] = 'mountain/contenido/pack_nuevo';
		}else{
			$data['contenido'] = 'mountain/contenido/pack_ver';
		}
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
    $data['title'] = 'Mountain';

		$this->load->view('template_mountain',$data);
	}
}
