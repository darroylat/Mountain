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
		$sumeneventosact=$this->Evento_model->resumensalidasactivas();
		$counteventosActivos=$this->Evento_model->counteventosActivos();/*Ejecujatamos la query*/
		$counteventosCerradas=$this->Evento_model->counteventosCerradas();/*Ejecujatamos la query*/
		$counteventosCanceladas=$this->Evento_model->counteventosCanceladas();/*Ejecujatamos la query*/
		
		$informeeventos["listaeventos"]=$Listaeventos;
		$informeeventos["sumeneventosact"]=$sumeneventosact;
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
		//$foto = $this->input->post("foto");
		$equipos=$this->input->post("equipo");
		$fechaevento = $this->input->post("fechaevento");
		$horaevento = $this->input->post("horaevento");
		$fechatermino = $this->input->post("fechatermino");
		$valor = $this->input->post("valor");
		//$arrayequipo = $this->input->post("equipo");
		
		$evento = $this->Evento_model->insert_evento($sendero,$nombre, $descripcion, $fechaevento, $horaevento, $fechatermino, $valor, $punto);

		if ($evento) {
		
		$target_dir ="images/eventos/";
		$target_file = $target_dir . basename($_FILES["foto"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
		$check = getimagesize($_FILES["foto"]["tmp_name"]);
    	if($check !== false) {
    	
    		echo "tenemos la imagen";
    		// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			if ($_FILES["foto"]["size"] > 5000000) {
			    echo "Disculpe,Archivo es muy pesado.";
			    $uploadOk = 0;
			}
			if($imageFileType != "jpg" && $imageFileType != "JPG") {
			    echo "Disculpe, Solo formato JPG, JPEG, PNG & GIF files are allowed. <br>";
			    $uploadOk = 0;
			}
			if ($uploadOk != 0) {
			     $target_file = $target_dir .$evento.".".$imageFileType;
			    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file))
			    {
			    	//echo "foto copiada";
			    	@$nombreimagen="images/eventos/".$evento.".".$imageFileType;
					@$nombreimagen2="images/eventos/".$evento.".".$imageFileType;
					//tamaño definido
					$ancho=360;
					$alto=306;
					//Modificar imagen a tamaño definido.
							$viejaimagen=imagecreatefromjpeg($nombreimagen2);
							$nuevaimagen=imagecreatetruecolor(360,306);
							imagecopyresized($nuevaimagen,$viejaimagen,0,0,0,0,$ancho,$alto,imagesx($viejaimagen),imagesy($viejaimagen));
							$ruta_real_imagenes=$nombreimagen2;
							imagejpeg($nuevaimagen,$nombreimagen2);
							//echo "imagen recortada";
							if ($equipos) {
		
							foreach ($equipos as $names)
							{
								$this->load->model('Evento_model','',$config);
								$evento = $this->Evento_model->insert_equipo($names,$evento);			
							       
								
								
							}
							redirect(base_url()."Evento/ver/".$evento);
							
								
							}
							else {
							redirect('/Evento');
							
							}
			    }
			    
			}
			else
			{
				echo "Disculpe, No se ha podido cargar la imagen.";
			}
    	}
    	else
    	{
    		echo "no hay imagen";
    	}
		
		
		
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
		$consulta['imagen'] = $id;
		
		
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/evento_individual';
		$data['datos'] = $consulta;
		
		$this->load->view('template_mountain', $data);
		
		
	}

}
