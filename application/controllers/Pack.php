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
		$resumenpacksactivas = $this->Pack_model->resumenpacksactivas();
		$countPackActivos=$this->Pack_model->countPackActivos();/*Ejecujatamos la query*/
		$countPackCerradas=$this->Pack_model->countPackCerradas();/*Ejecujatamos la query*/
		$countPackCanceladas=$this->Pack_model->countPackCanceladas();/*Ejecujatamos la query*/
		$consultas['packs'] = $packs;
		$consultas['resumenpacksactivas'] = $resumenpacksactivas;
		$consultas["cntactivos"]=$countPackActivos["CONTADOR"];
		$consultas["cntcerradas"]=$countPackCerradas["CONTADOR"];
		$consultas["cntcanceladas"]=$countPackCanceladas["CONTADOR"];

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
		$cantidad = $this->Pack_model->getAuto($id);
		
		$consulta['evento'] = $evento;
		$consulta['valor'] = $valor;
		$consulta['usuarios'] = $usuarios;
		$consulta['comprobante'] = $comprobante;
		$consulta['senderos'] = $senderos;
		$consulta['cantidad'] = $cantidad;
		$consulta['imagen'] = $id;
		
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
		$fechacierre = $this->input->post("fechacierre");
		$totallg = $this->input->post("total");
		//echo "hola".$totallg."<br>";
		
		$evento = $this->Pack_model->insert_pack($nombre,$descripcion, $valor, $fechainicio,$fechacierre);
		
		if ($evento) {
		//		redirect('/Pack');
		$target_dir ="images/packs/";
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
			    	@$nombreimagen="images/packs/".$evento.".".$imageFileType;
					@$nombreimagen2="images/packs/".$evento.".".$imageFileType;
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
							if ($totallg) {
			
								for ($x = 1; $x <= $totallg; $x++) {
								    
								    if($this->input->post("lg".$x))
									{
									//	echo "id pack :";
									//	echo $evento;
									//	echo "<br>";
									//	echo "id lugar :";
									//	echo $lugar = $this->input->post("lg".$x);
									//	echo " id sendero:";
									    $sendero = $this->input->post("slg".$x);
									//    echo "<br>";
									    $this->load->model('Pack_model','',$config);
										$evento = $this->Pack_model->insert_pack_senderos($evento,$sendero);
									}
								} 
								redirect(base_url()."pack/ver/".$evento);
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
}
