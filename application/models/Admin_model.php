<?php
class Admin_model extends CI_Model {

        public $id;
        public $title;
        public $content;
        public $date;

        public function __construct()	{
          $this->load->database();
        }
        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

        public function insert_entry($nombre, $usuario, $pass, $mail)
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }
        public function select_cuenta_usuario($usuario){
                $this->db->get_where_one('CLIENTE', array('USUARIOCLIENTE' => $usuario ));
        }
        public function update_entry($nombre, $usuario, $pass, $mail, $id)
        {
                $data['nombrecliente']  = $nombre;
                $data['usuariocliente'] = $usuario;
                $data['passcliente']    = $pass;
                $data['mailcliente']    = $mail;
                $data['datoscliente']   = 'MOUNTAIN_'.strtoupper($usuario);

                $query = $this->db->update('CLIENTE', $data, array('IDCLIENTE' => $id));
                return $query;
        }
        //Funcionando
        public function get_where_one($id){
            $query = $this->db->get_where('CLIENTE',array('IDCLIENTE' => $id));
            return $query->row_array();
        }
        
        //contador salidas de trekking
        public function contadoreventos(){
        	
        	$query=$this->db->query('select count(*) as contadoreventos from EVENTO');
        	return $query->row_array();
        	
        }
        //Contador de inscritos que realizaron su deposito
         public function contadordepositos(){
        	
        	$query=$this->db->query('SELECT COUNT(IDINSCRIPCION) AS CONTADORDEPOSITOS FROM INSCRIPCIONEVENTO WHERE COMPROBANTE=1');
        	return $query->row_array();
        	
        }
        // Contador total de usuarios registrados
        public function contadorusuarios(){
        	
        	$query=$this->db->query('select count(*) as contadorusuario from USUARIO');
        	return $query->row_array();
        	
        }
        //Grafico ingresados y pagados
        public function comprobantesnocomprantes(){
        	
        	$query=$this->db->query('select E.nombre AS NOMBRE,COALESCE ((select COUNT(I.COMPROBANTE)
			from EVENTO ES1
			LEFT JOIN INSCRIPCIONEVENTO I ON ES1.IDEVENTO=I.IDEVENTO
			WHERE COMPROBANTE=2 AND ES1.IDEVENTO=E.IDEVENTO
			GROUP BY ES1.IDSENDERO),0) AS PAGADO,
                        (select COUNT(I.COMPROBANTE)
			from EVENTO ES1
			LEFT JOIN INSCRIPCIONEVENTO I ON ES1.IDEVENTO=I.IDEVENTO
			WHERE COMPROBANTE IN (0,1) AND ES1.IDEVENTO=E.IDEVENTO
			GROUP BY ES1.IDSENDERO) AS INSCRITOS
			from EVENTO E
			LEFT JOIN INSCRIPCIONEVENTO I ON E.IDEVENTO=I.IDEVENTO
			GROUP BY E.IDSENDERO
			Limit 2');
        	return $query->result();
        }
        // Resumen de la cantidad de hombres y mujeres
        public function sexousuarios(){
        	
        	$query=$this->db->query('SELECT  SUM(IF (SEXO="M",1,0)) AS MASCULINO,
			SUM(IF (SEXO="F",1,0)) AS FEMENINO,
			SUM(IF (SEXO in ("F","M"),1,0)) AS TOTAL
			FROM USUARIO');
        	return $query->result();
        }
        //Lista de usuarios
		public function listausuarios(){
        	
        	$query=$this->db->query('select U.NOMBRE,U.APELLIDO,U.TELEFONO, M.NOMBRE AS NIVEL, U.EMAIL,U.AUTOCOMPAR,U.EDAD,
        	U.INSTAGRAM,U.INGRESO
			from USUARIO U
			LEFT JOIN MAESTRONIVELUSUARIO M ON M.IDNIVEL=U.IDNIVEL');
        	return $query;
        	
        }
        // Lista de servicios activos entre pack y salidas de trekking
        public function listaservicios(){
        	
        	$query=$this->db->query(' select NOMBRE as eventos from EVENTO
			union
			select NOMBRE as pack from PACK');
        	return $query;
        	
        }


}
