<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller{

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
	public function index()
	{

	}

  public function registro($id){
/*
    $config['hostname'] = 'localhost';
    $config['username'] = 'root';
    $config['password'] = '';
    $config['database'] = 'mountain_admin';
    $config['dbdriver'] = 'mysqli';
    $config['dbprefix'] = '';
    $config['pconnect'] = FALSE;
    $config['db_debug'] = TRUE;
*/
    if (isset($id)) {
      //$this->load->model('Admin_model','',$config);
      $this->load->model('Admin_model');
      $query = $this->Admin_model->get_where_one($id);

      if ($query['IDCLIENTE'] == $id && $query['USUARIOCLIENTE'] == 'mountain' && $query['MAILCLIENTE'] == 'mountain') {

          $data['header'] = 'principal/header_oscuro';
          $data['main'] = 'principal/cliente/registro';
          $data['footer'] = 'principal/footer';
					$data['id'] = $id;

          $this->load->helper('url');
          //$this->load->view('principal/contacto/contacto');
          $this->load->view('principal/template_otros_principal',$data);

      }else{
        $data['heading'] = '404 Page Not Found';
        $data['message'] = 'The page you requested was not found.';

        $this->load->view('errors/html/error_404',$data);
      }
    }else{
      $data['heading'] = '404 Page Not Found';
      $data['message'] = 'The page you requested was not found.';

      $this->load->view('errors/html/error_404',$data);
    }

  }
	public function ingresar(){

		//$this->load->helper('url');

		$usuario = $this->input->post("user");
		$contrasena = $this->input->post("pass");
		$this->load->model('Cliente_model');
		$query = $this->Cliente_model->select_cuenta_usuario($usuario, $contrasena);
		if($query != null){
				$cliente_data = array(
               'id' => $query['IDCLIENTE'],
               'nombre' => $query['NOMBRECLIENTE'],
							 'usuario' => $query['USUARIOCLIENTE'],
							 'basedatos' => $query['DATOSCLIENTE'],
               'logueado' => TRUE
        );
			$this->session->set_userdata($cliente_data);
			//echo "encontro usuario";
			redirect('/administracion/');
		}else{
			redirect('/principal/ingresa');
		}

	}
	public function registrar(){
		$nombre = $this->input->post("nombre");
		$usuario = $this->input->post("user");
		$contrasena = $this->input->post("pass");
		$recontrasena = $this->input->post("cpass");
		$correo = $this->input->post("mail");
		$id = $this->input->post("id");

		$this->load->model('Admin_model');
		$buscando = $this->Admin_model->get_user($usuario);

		if (isset($nombre) && isset($usuario) && isset($contrasena) && isset($recontrasena) && isset($correo)) {
			if ($contrasena == $recontrasena) {

	      $query = $this->Admin_model->update_entry($nombre, $usuario, $contrasena, $correo, $id);
				if ($query) {
					//TODO ir al panel de control del cliente
				}
			}
		}
	}
	public function cerrar_sesion(){
		//echo base_url();
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect('/principal', 'refresh');
	}
}
