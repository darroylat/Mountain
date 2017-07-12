<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingresos extends CI_Controller{

	public function index(){

	}
	 public function ingresos_eventos(){
	 	$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
	 	$this->load->model('Ingresos_model','',$config);
		$Listaeventos=$this->Ingresos_model->Listaeventos();/*Ejecujatamos la query*/
		$sumeneventosact=$this->Ingresos_model->resumensalidasactivas();
		$counteventosActivos=$this->Ingresos_model->counteventosActivos();/*Ejecujatamos la query*/
		$counteventosCerradas=$this->Ingresos_model->counteventosCerradas();/*Ejecujatamos la query*/
		$counteventosCanceladas=$this->Ingresos_model->counteventosCanceladas();/*Ejecujatamos la query*/
		
		$informeeventos["listaeventos"]=$Listaeventos;
		$informeeventos["sumeneventosact"]=$sumeneventosact;
		$informeeventos["cntactivos"]=$counteventosActivos["CONTADOR"];
		$informeeventos["cntcerradas"]=$counteventosCerradas["CONTADOR"];
		$informeeventos["cntcanceladas"]=$counteventosCanceladas["CONTADOR"];
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/Ingresos_evento_ver';
		$data['datos'] =$informeeventos;
		
		$this->load->view('template_mountain', $data);
		
	  }
	   public function ingresos_packs(){
	 	$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
	 	$this->load->model('Ingresos_model','',$config);
		$Listapacks=$this->Ingresos_model->Listapacks();/*Ejecujatamos la query*/
		$resumenPackactivas=$this->Ingresos_model->resumenPackactivas();
		$resumenEstadoPack=$this->Ingresos_model->resumenEstadoPack();
		
		$informeeventos["Listapacks"]=$Listapacks;
		$informeeventos["resumenPackactivas"]=$resumenPackactivas;
		$informeeventos["resumenEstadoPack"]=$resumenEstadoPack;

		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/Ingresos_pack_ver';
		$data['datos'] =$informeeventos;
		
		$this->load->view('template_mountain', $data);
		
	  }

}
