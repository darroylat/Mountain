<?php
class Campana_model extends CI_Model {
  public function __construct()	{
    $this->load->database();
  }
 

  
  public function Eventosactivos(){
        	
        	// Solo cuenta los lugares en los que el cliente pago y estan cerradas
        	$query=$this->db->query('SELECT * FROM EVENTO E
			WHERE E.ESTADO=0');
        	return $query;
        	
    }
    public function listusuariossendmail($id){
        	
        	// Solo cuenta los lugares en los que el cliente pago y estan cerradas
        	$query=$this->db->query('SELECT * FROM USUARIO WHERE IDUSUARIO in (21443907,11339227,11851343,12253838) AND IDNIVEL IN ('.$id.') and EMAIL != ""');
        	
        	return $query;
        	
    }
    public function listueventossendmail($id){
        	
        	// Solo cuenta los lugares en los que el cliente pago y estan cerradas
        	$query=$this->db->query('SELECT * FROM EVENTO WHERE IDEVENTO IN ('.$id.')');
        	
        	return $query;
        	
    }
}
