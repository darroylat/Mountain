<?php
class Usuario_model extends CI_Model {


        public function __construct()	{
          $this->load->database();
        }
		    public function contadorusuariosactivos(){

        	$query=$this->db->query('select count(*) as contadorusuario from USUARIO where ESTADO=1');
        	return $query->row_array();

        }
        public function contadorusuariosdesactivados(){

            	$query=$this->db->query('select count(*) as contadorusuario from USUARIO where ESTADO=0');
            	return $query->row_array();

        }
        public function contadorusuarios(){

        	$query=$this->db->query('select count(*) as contadorusuario from USUARIO');
        	return $query->row_array();

        }
        public function contadornuevostrekking(){

        	$query=$this->db->query('select count(*) as contadorusuario from USUARIO where PRIMERTREKKING=1');
        	return $query->row_array();

        }
        public function contadornuevosusuarios(){

        	$query=$this->db->query('select count(*) as contadorusuario from USUARIO
where  left(INGRESO,10)=left(now(),10)');
        	return $query->row_array();

        }
        public function listausuarios(){

        	$query=$this->db->query('select U.IDUSUARIO,U.NOMBRE,U.APELLIDO,U.TELEFONO, M.NOMBRE AS NIVEL, U.EMAIL,U.AUTOCOMPAR,U.EDAD,
        	U.INSTAGRAM,U.INGRESO
			from USUARIO U
			LEFT JOIN MAESTRONIVELUSUARIO M ON M.IDNIVEL=U.IDNIVEL');
        	return $query;

        }
        public function buscarusuario($rut){

        	$query=$this->db->query('select U.IDUSUARIO,U.NOMBRE,U.APELLIDO,U.TELEFONO, M.NOMBRE AS NIVEL, U.EMAIL,U.AUTOCOMPAR,U.SEXO,U.EDAD,
        	U.INSTAGRAM,U.INGRESO
			from USUARIO U
			LEFT JOIN MAESTRONIVELUSUARIO M ON M.IDNIVEL=U.IDNIVEL where IDUSUARIO='.$rut);
        	return $query->row();

        }
        public function equipousuario($rut){

        	$query=$this->db->query('SELECT ME.NOMBRE FROM EQUIPOUSUARIO E
										LEFT JOIN MAESTROEQUIPO ME
										ON E.IDEQUIPOTRECK=ME.IDEQUIPOTRECK
										WHERE IDUSUARIO='.$rut);
        	return $query->result();

        }
        public function datosemergencia($rut){

        	$query=$this->db->query('SELECT * FROM USUARIOEMERGENCIA WHERE IDUSUARIO='.$rut);
        	return $query->row();

        }

        public function lugaresasistidos($rut){

        	// Solo cuenta los lugares en los que el cliente pago y estan cerradas
        	$query=$this->db->query('SELECT DISTINCT (E.NOMBRE),I.COMPROBANTE FROM INSCRIPCIONEVENTO I
				LEFT JOIN EVENTO E
				ON E.IDEVENTO=I.IDEVENTO
				where I.IDUSUARIO='.$rut.'
				AND E.ESTADO=1
				and I.COMPROBANTE=2
				ORDER BY COMPROBANTE DESC');
        	return $query->result();

        }
        public function Inscripcionesusuario($rut){

        	// Solo cuenta los lugares en los que el cliente pago y estan cerradas
        	$query=$this->db->query('SELECT E.NOMBRE,I.FECHA,E.VALOR,E.ESTADO,I.COMPROBANTE FROM INSCRIPCIONEVENTO I
									LEFT JOIN EVENTO E
									ON E.IDEVENTO=I.IDEVENTO
									where I.IDUSUARIO='.$rut.'
									ORDER BY COMPROBANTE DESC');
        	return $query->result();

        }
		public function insert_usuario($rut,$contrasena, $sexo, $nivel,$nombres,$apellidos,$descripcion,$correo){

	    $data['IDUSUARIO'] = $rut;
	    $data['PASSWORD'] = $contrasena;
	    $data['SEXO'] = $sexo;
	    $data['IDNIVEL'] = $nivel;
	    $data['NOMBRE'] = $nombres;
	    $data['APELLIDO'] = $apellidos;
	    $data['DESCRIPCION'] = $descripcion;
	    $data['EMAIL'] = $correo;
	    //por defecto
	    $data['NIVEL'] = 1;
	    $data['ESTADO'] = 1;
	    $data['AUTO'] = 0;
	    $data['AUTOCOMPAR'] = 0;
	    $data['PRIMERTREKKING'] = 0;
	    //$data['FECHA'] = 'NOW()';
	    $this->db->insert('USUARIO', $data);

	    //return ($this->db->affected_rows() != 1) ? false : true;
		return $nombres;
	  }
	  public function resumenUsuariosactivos(){
		$query = $this->db->query('SELECT
									sum(case when IDNIVEL= 1 then 1 else 0 end) AS NIVEL1,
									sum(case when IDNIVEL = 2 then 1 else 0 end) AS NIVEL2,
									sum(case when IDNIVEL= 3 then 1 else 0 end) AS NIVEL3,
                                    sum(case when IDNIVEL= 4  then 1 else 0 end) AS NIVEL4,
									sum(case when IDNIVEL= 5 then 1 else 0 end) AS NIVEL5
									FROM USUARIO
									WHERE IDUSUARIO IN (SELECT IDUSUARIO FROM USUARIO WHERE ESTADO=1)');
		return $query->row();
	}
}
