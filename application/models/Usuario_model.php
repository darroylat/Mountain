<?php
class Usuario_model extends CI_Model {


        public function __construct()	{
          $this->load->database();
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
        	
        	$query=$this->db->query('select U.NOMBRE,U.APELLIDO,U.TELEFONO, M.NOMBRE AS NIVEL, U.EMAIL,U.AUTOCOMPAR,U.EDAD,
        	U.INSTAGRAM,U.INGRESO
			from USUARIO U
			LEFT JOIN MAESTRONIVELUSUARIO M ON M.IDNIVEL=U.IDNIVEL');
        	return $query;
        	
        }
}
