<?php
class Equipo_model extends CI_Model {

  public function __construct()	{
    $this->load->database();
  }

  public function insert_equipamiento($nombre, $descripcion){
    $data['NOMBRE'] = $nombre;
    $data['DESCRIPCION'] = $descripcion;
    //$data['FECHA'] = 'NOW()';
    $this->db->insert('MAESTROEQUIPO', $data);

    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function all_equipo(){
    $query = $this->db->get('MAESTROEQUIPO');
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return FALSE;
    }
  }

  public function insert_equipoevento($idequipo, $idcapture){
    $data['IDEQUIPOTRECK'] = $idequipo;
    $data['IDEVENTO'] = $idcapture;
    $this->db->insert('EQUIPOEVENTO', $data);
  }
}
