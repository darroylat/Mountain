<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller{

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

		$data['header'] = 'principal/header';
		$data['banner'] = 'principal/banner';
		$data['main'] = 'principal/main';
		$data['cta'] = 'principal/cta';
		$data['footer'] = 'principal/footer';

		//$this->load->view('header');
    $this->load->helper('url');
		$this->load->view('template_principal',$data);
		//$this->load->view('footer');
	}
  public function contacto(){
    $data['header'] = 'principal/header_oscuro';
    $data['main'] = 'principal/contacto/contacto';
    $data['footer'] = 'principal/footer';

    $this->load->helper('url');
    //$this->load->view('principal/contacto/contacto');
    $this->load->view('principal/template_otros_principal',$data);
  }
  public function elementos(){
    $this->load->helper('url');
    $this->load->view('principal/element/elementos');
  }

  public function ingresa(){
    $data['header'] = 'principal/header_oscuro';
    $data['main'] = 'principal/ingresar/ingresar';
    $data['footer'] = 'principal/footer';

    $this->load->helper('url');
    $this->load->view('principal/template_otros_principal',$data);
  }
}
