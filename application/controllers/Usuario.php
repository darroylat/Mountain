<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		
		$data['contenido'] = 'mountain/contenido/usuario_nuevo';
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
    	$data['title'] = 'Mountain';

		$this->load->view('template_mountain',$data);
	}

	
	public function ver_usuarios()
	{
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$this->load->model('Usuario_model','',$config);/* cargamos modelo con query*/
		$cantidadusuarios=$this->Usuario_model->contadorusuarios();/*Ejecujatamos la query*/
		$cantidadnuevostrekk=$this->Usuario_model->contadornuevostrekking();/*Ejecujatamos la query*/
		$cantidadnuevosregistrados=$this->Usuario_model->contadornuevosusuarios();
		$listausuarios=$this->Usuario_model->listausuarios();/*Ejecujatamos la query*/
		
		$hola["cantidadusuarios"]=$cantidadusuarios["contadorusuario"];
		$hola["cantidadnuevostrekk"]=$cantidadnuevostrekk["contadorusuario"];
		$hola["cantidadnuevosregis"]=$cantidadnuevosregistrados["contadorusuario"];
		$hola["listausuarios"]=$listausuarios;
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/Usuario_lista';
		$data['datos'] = $hola;
		
		$this->load->helper('url');
		$this->load->view('template_mountain', $data);
	}

}
