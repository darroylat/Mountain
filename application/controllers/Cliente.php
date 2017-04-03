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

    $config['hostname'] = 'localhost';
    $config['username'] = 'root';
    $config['password'] = '';
    $config['database'] = 'gam_cliente';
    $config['dbdriver'] = 'mysqli';
    $config['dbprefix'] = '';
    $config['pconnect'] = FALSE;
    $config['db_debug'] = TRUE;

    if (isset($id)) {
      $this->load->model('cliente_model','',$config);
      $query = $this->cliente_model->get_where_one($id);

      if ($query['id_cliente'] == $id && $query['user_cliente'] == 'gam') {

          $data['header'] = 'principal/header_oscuro';
          $data['main'] = 'principal/cliente/registro';
          $data['footer'] = 'principal/footer';

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

}
