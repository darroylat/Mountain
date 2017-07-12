<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campana extends CI_Controller{

	public function index(){
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
	 	$this->load->model('Campana_model','',$config);
	 	
		$eventosactivos = $this->Campana_model->Eventosactivos();
		$consultas['eventosactivos'] = $eventosactivos;
		$data['encabezado'] = 'mountain/encabezado';
		$data['menu'] = 'mountain/menu';
		$data['contenido'] = 'mountain/contenido/campana_nuevo';
		$data['datos'] = $consultas;
		
		$this->load->view('template_mountain', $data);
	}
	
	public function Enviar(){
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = $this->session->userdata('basedatos');
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$this->load->model('Campana_model','',$config);
		
		 $subjeto = $this->input->post("nombre");
		 $descripcion = $this->input->post("descripcion");
		 $arrayeventos = $this->input->post("evento");
		 $arrayniveles = $this->input->post("nivel");
		
		if ($arrayeventos) {
		
		$lugares="";
			foreach ($arrayeventos as $evento)
			{
				$lugares.=$evento.",";
			}
		 $lugares= $lugares.="0";
		
			if ($arrayniveles) {
			
			$niveles="";
					foreach ($arrayniveles as $nivel)
					{
						$niveles.=$nivel.",";
					}
			 $niveles=$niveles.="0";
			
			$listueventossendmail = $this->Campana_model->listueventossendmail($lugares);
			$eventosactivos = $this->Campana_model->listusuariossendmail($niveles);
				
				if ($listueventossendmail){
					
					$body="";
					$body.="<html><body><ul>";
					foreach ($listueventossendmail->result()  as $lugares)
						{
							$body.="<li>";
							$nombre= $lugares->NOMBRE;
							$body.=$nombre;
							$body.="</li>";
						}
					echo  $subjeto;
					echo $body.="</ul></body></html>";
					
					if ($eventosactivos){
						
						$contadorenvios=0;
						foreach ($eventosactivos->result()  as $email)
						{
							$usuariosend= $email->EMAIL;
							include_once('mail/class.phpmailer.php');
							include_once('mail/class.smtp.php');
							 
							//Recibir todos los parámetros del formulario
							$para = $usuariosend;//$_POST['email'];
							$asunto = "Envio correo prueba1";//$_POST['asunto'];
							$mensaje = "Es tu primer correo ";//$_POST['mensaje'];
							$archivo = //$_FILES['hugo'];
							 
							//Este bloque es importante
							$mail = new PHPMailer();
							$mail->IsSMTP();
							$mail->SMTPAuth = true;
							$mail->SMTPSecure = "ssl";
							$mail->Host = "smtp.gmail.com";
							$mail->Port = 465;
							 
							 
							//Nuestra cuenta
							$mail->Username ='darroylat@gmail.com';
							$mail->Password = 'deal051085'; //Su password
							
							// Dirección de correo del remitente
							$mail->From = "no-reply@lerolero.cl";
							$mail->FromName = "Trekking Weekend Promoción";
							 
							//Agregar destinatario
							$mail->AddAddress($para);
							$mail->Subject = $subjeto;
							//$mail->Body =$body;
							//Para adjuntar archivo
							//$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
							$mail->MsgHTML($body);
							 
							//Avisar si fue enviado o no y dirigir al index
							if($mail->Send())
							{
							    $contadorenvios=$contadorenvios+1;
							}
						}
					}
				}
			
			}
			
			
		else {
			echo "ho hay niveles";
		}

		}
		else {
			 echo "No hay eventos";
		}
	}
	public function htmlcorreo(){
		echo "
		<html>
		<head>
		</head>
		<body>
		<div style='background:rgb(83, 163, 24);'>
			<h1><span style='color: #ff9900;'>You can edit&nbsp;text!</span></h1>
			<p>Paste your documents in the visual editor on the left or your HTML code in the source editor in the right. <br />Edit any of the two areas and see the other changing in real time.&nbsp;</p>
			<p>Click the <span style='background-color: #2b2301; color: #fff; display: inline-block; padding: 3px 10px; font-weight: bold; border-radius: 5px;'>Clean</span> button to clean your source code.</p>
			<h2 style='color: #2e6c80;'>Some useful features:</h2>
			<ol style='list-style: none; font-size: 14px; line-height: 32px; font-weight: bold;'>
			<li style='clear: both;'>Interactive source editor</li>
			<li style='clear: both;'>HTML Cleaning</li>
			</ol>
			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
			<p><strong>&nbsp;</strong></p>
		<div>
		</body>
		</html>
		";
	}
	public function Enviarprueba(){
		
		include_once('mail/class.phpmailer.php');
		include_once('mail/class.smtp.php');
		 
		//Recibir todos los parámetros del formulario
		$para = "luis.18.144@gmail.com";//$_POST['email'];
		$asunto = "Envio correo prueba1";//$_POST['asunto'];
		$mensaje = "Es tu primer correo ";//$_POST['mensaje'];
		$archivo = //$_FILES['hugo'];
		 
		//Este bloque es importante
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		 
		 
		//Nuestra cuenta
		$mail->Username ='darroylat@gmail.com';
		$mail->Password = 'deal051085'; //Su password
		
		// Dirección de correo del remitente
		$mail->From = "no-reply@lerolero.cl";
		$mail->FromName = "Trekking Weekend Promoción";
		 
		//Agregar destinatario
		$mail->AddAddress('luis.18.144@gmail.com');
		$mail->Subject = 'Nombre campaña';
		$mail->Body = 'Prueba';
		//Para adjuntar archivo
		//$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
		//$mail->MsgHTML('$mensajeaaaaaaaaaaaaaa');
		 
		//Avisar si fue enviado o no y dirigir al index
		if($mail->Send())
		{
		    echo'<script type="text/javascript">
		            alert("Enviado Correctamente");
		            //window.location="http://localhost/maillocal/index.php"
		         </script>';
		}
		else{
		    echo'<script type="text/javascript">
		            alert("NO ENVIADO, intentar de nuevo");
		            //window.location="http://localhost/maillocal/index.php"
		         </script>';
		}
	}

}
