<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller{

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
	 	$this->load->model('Equipo_model','',$config);
		
		$ubicacion = $this->Ubicacion_model->all_ubicacion();
		$equipo = $this->Equipo_model->all_equipo();
		$consultas['ubicacion'] = $ubicacion;
		$consultas['equipo'] = $equipo;
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/evento_nuevo';
		$data['datos'] = $consultas;
		
		$this->load->view('template_mountain', $data);
	}
	 public function ver_eventos(){
	 	$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
	 	$this->load->model('Evento_model','',$config);
		$Listaeventos=$this->Evento_model->Listaeventos();/*Ejecujatamos la query*/
		$counteventosActivos=$this->Evento_model->counteventosActivos();/*Ejecujatamos la query*/
		$counteventosCerradas=$this->Evento_model->counteventosCerradas();/*Ejecujatamos la query*/
		$counteventosCanceladas=$this->Evento_model->counteventosCanceladas();/*Ejecujatamos la query*/
		
		$informeeventos["listaeventos"]=$Listaeventos;
		$informeeventos["cntactivos"]=$counteventosActivos["CONTADOR"];
		$informeeventos["cntcerradas"]=$counteventosCerradas["CONTADOR"];
		$informeeventos["cntcanceladas"]=$counteventosCanceladas["CONTADOR"];
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/evento_ver';
		$data['datos'] =$informeeventos;
		
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
		$this->load->model('Evento_model','',$config);
		
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$punto = $this->input->post("punto");
		$ubicacion = $this->input->post("ubicacion");
		$sendero = $this->input->post("sendero");
		$foto = $this->input->post("foto");
		$equipos=$this->input->post("equipo");
		$fechaevento = $this->input->post("fechaevento");
		$horaevento = $this->input->post("horaevento");
		$fechatermino = $this->input->post("fechatermino");
		$valor = $this->input->post("valor");
		$arrayequipo = $this->input->post("equipo");
		
		$evento = $this->Evento_model->insert_evento($sendero,$nombre, $descripcion, $fechaevento, $horaevento, $fechatermino, $valor, $punto, $foto);

		if ($evento) {
		
		if ($equipos) {
		
		foreach ($equipos as $names)
		{
			$this->load->model('Evento_model','',$config);
			$evento = $this->Evento_model->insert_equipo($names,$evento);			
		       // print "Id Equipo utilizado $names"." id evento".$evento."<br/> ";
			
			
		}
		redirect('/Evento');
		}
		else {
		redirect('/Evento');
		
		}
		//	foreach ($equipos as $key) {
				//echo $key.'</br>';
		//		$idcapture = $this->Evento_model->insert_equipo();
		//		$this->load->model('Equipo_model','',$config);
		//		$this->Equipo_model->insert_equipo($key, $idcapture);
		//	}
		}

	}
	
	// 
	public function ver($id){
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
	 	$this->load->model('Evento_model','',$config);
		
		$evento = $this->Evento_model->getEvento($id);
		$valor = $this->Evento_model->getValorPagadoEvento($id);
		$comprobante = $this->Evento_model->getValorComprobanteEvento($id);
		$usuarios = $this->Evento_model->getUsuariosInscritos($id);
		$ubicacion = $this->Evento_model->getSenderoUbicacion($id);
		$equipo = $this->Evento_model->getEquipoEvento($id);
		$cantidad = $this->Evento_model->getAuto($id);
		
		$consulta['evento'] = $evento;
		$consulta['valor'] = $valor;
		$consulta['usuarios'] = $usuarios;
		$consulta['ubicacion'] = $ubicacion;
		$consulta['comprobante'] = $comprobante;
		$consulta['equipo'] = $equipo;
		$consulta['cantidad'] = $cantidad;
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/evento_individual';
		$data['datos'] = $consulta;
		
		$this->load->view('template_mountain', $data);
		
		
	}

}
