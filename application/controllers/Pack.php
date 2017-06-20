<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pack extends CI_Controller{

	public function __construct(){
        parent::__construct();
				if(!is_logged_in()){  // if you add in constructor no need write each function in above controller.
         redirect('/principal');
        }
  }

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
		
		$ubicacion = $this->Ubicacion_model->all_ubicacion();
		$consultas['ubicacion'] = $ubicacion;
		$data['contenido'] = 'mountain/contenido/pack_nuevo';
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
    	$data['title'] = 'Mountain';
		$data['datos'] = $consultas;
		$this->load->view('template_mountain',$data);
	}
	public function ver_pack(){
		
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
	 	$this->load->model('Pack_model','',$config);
		
		$packs = $this->Pack_model->Listapack();
		$consultas['packs'] = $packs;

		$data['contenido'] = 'mountain/contenido/pack_ver';
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
    	$data['title'] = 'Mountain';
		$data['datos'] = $consultas;
		$this->load->view('template_mountain',$data);
	}
	public function ver($id){
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
	 	$this->load->model('Pack_model','',$config);
		$evento = $this->Pack_model->getPack($id);
		$valor = $this->Pack_model->getValorPagadoPack($id);
		$comprobante = $this->Pack_model->getValorComprobantepack($id);
		$usuarios = $this->Pack_model->getUsuariosInscritosPack($id);
		$senderos = $this->Pack_model->getSenderosPack($id);
		
		$consulta['evento'] = $evento;
		$consulta['valor'] = $valor;
		$consulta['usuarios'] = $usuarios;
		$consulta['comprobante'] = $comprobante;
		$consulta['senderos'] = $senderos;
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/pack_individual';
		$data['datos'] = $consulta;
		
		$this->load->view('template_mountain', $data);
	}
	public function crear(){
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$this->load->model('Pack_model','',$config);
		
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$foto = $this->input->post("foto");
		$valor = $this->input->post("valor");
		$fechainicio = $this->input->post("fechainicio");
		
		$evento = $this->Pack_model->insert_pack($nombre,$descripcion, $valor, $fechainicio);

		if ($evento) {
				redirect('/Pack');
		}

	}
}
