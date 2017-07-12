<?php
class Informes_model extends CI_Model {


        public function __construct()	{
          $this->load->database();
        }

      
        public function Inscripcionesusuario(){
        	
        	// Solo cuenta los lugares en los que el cliente pago y estan cerradas
        	$query=$this->db->query('SELECT E.NOMBRE AS NOMBREVENTO,U.NOMBRE,U.APELLIDO,U.TELEFONO,I.FECHA,E.VALOR,E.ESTADO,I.COMPROBANTE FROM INSCRIPCIONEVENTO I
									LEFT JOIN EVENTO E
									ON E.IDEVENTO=I.IDEVENTO
									LEFT JOIN USUARIO U
									ON I.IDUSUARIO=U.IDUSUARIO
									ORDER BY E.NOMBRE,FECHA DESC');
        	return $query->result();
        	
        }
        public function Depositos(){
        	
        	// Solo cuenta los lugares en los que el cliente pago y estan cerradas
        	$query=$this->db->query('SELECT E.NOMBRE AS NOMBREVENTO,E.VALOR,I.IDUSUARIO,U.NOMBRE,U.APELLIDO,U.EMAIL,U.TELEFONO, I.COMPROBANTE,I.IDINSCRIPCION FROM 
									INSCRIPCIONEVENTO I
									LEFT JOIN EVENTO E
									ON E.IDEVENTO=I.IDEVENTO
									LEFT JOIN USUARIO U
									ON U.IDUSUARIO=I.IDUSUARIO
									WHERE I.COMPROBANTE=1 AND E.ESTADO=0');
        	return $query->result();
        	
        }
        public function ConfirmarDepositos($id){
        	
        	// Solo cuenta los lugares en los que el cliente pago y estan cerradas
        	$query=$this->db->query('UPDATE INSCRIPCIONEVENTO SET COMPROBANTE=2 WHERE IDINSCRIPCION	='.$id);
        	return $query;
        	
        }
}
