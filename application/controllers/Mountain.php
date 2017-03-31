<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mountain extends CI_Controller{


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
}
