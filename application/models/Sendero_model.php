<?php
class Sendero_model extends CI_Model {
  public function __construct()	{
    $this->load->database();
  }

  public function all_dificultad(){
    $query = $this->db->get('MAESTRONIVELSENDERO');
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return FALSE;
    }
  }

  public function insert_sendero($ubicacion, $nombre, $nivel, $descripcion){
    $data['IDUBICACION'] = $ubicacion;
    $data['NOMBRE'] = $nombre;
    $data['IDDIFICULTAD'] = $nivel;
    $data['DESCRIPCION'] = $descripcion;

    $query = $this->db->insert('SENDERO', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function select_sendero($id){
    $query = $this->db->get('SENDERO');
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return FALSE;
    }
  }
  public function sendedorsdelugar($id){
        	
        	$query=$this->db->query('select * FROM SENDERO WHERE IDUBICACION='.$id);
        	
	    	return $query->result();
        	
        }
	public function listasenderos(){
        	
        	$query=$this->db->query('SELECT * FROM SENDERO');
        	return $query;
        	
    }
}
