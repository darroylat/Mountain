<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informes extends CI_Controller{

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
		
	}
	public function inscripciones(){
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
	 	$this->load->model('Informes_model','',$config);
		$Inscripcionesusuario = $this->Informes_model->Inscripcionesusuario();

		$consulta['Inscripcionesusuario'] = $Inscripcionesusuario;
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/inscripciones_ver';
		$data['datos'] = $consulta;
		
		$this->load->view('template_mountain', $data);
		
		
	}
	public function depositos(){
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
	 	$this->load->model('Informes_model','',$config);
		$Inscripcionesusuario = $this->Informes_model->Inscripcionesusuario();
		$Depositos = $this->Informes_model->Depositos();

		$consulta['Inscripcionesusuario'] = $Inscripcionesusuario;
		$consulta['Depositos'] = $Depositos;
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/depositos_ver';
		$data['datos'] = $consulta;
		
		$this->load->view('template_mountain', $data);
		
		
	}
	public function confdeposito(){
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		
		$deposito =  $this->uri->segment(3);
		echo $deposito;
	 	$this->load->model('Informes_model','',$config);
		$Inscripcionesusuario = $this->Informes_model->ConfirmarDepositos($deposito);
		
		if ($Inscripcionesusuario)
		{
			 echo'<script type="text/javascript">alert("Deposito aceptado");</script>';
            redirect('/informes/depositos');
		}
		else {
			echo '<script type="text/javascript"> alert("Deposito no ingresado");</script>';
            redirect('/informes/depositos');
		
		}
		

		
		
	}

}
