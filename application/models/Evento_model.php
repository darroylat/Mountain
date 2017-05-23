<?php
class Evento_model extends CI_Model {
  public function __construct()	{
    $this->load->database();
  }

  public function insert_evento($nombre, $descripcion, $fecha, $hora, $fechacierre, $valor, $punto, $foto){

    $data['NOMBRE'] = $nombre;
    $data['DESCRIPCION'] = $descripcion;
    $data['FECHA'] = $fecha;
    $data['HORA'] = $hora;
    $data['FECHACIERRE'] = $fechacierre;
    $data['VALOR'] = $valor;
    $data['PUNTO'] = $punto;
    $data['FOTO'] = $foto;
    //$data['FECHA'] = 'NOW()';
    $this->db->insert('EVENTO', $data);

    return ($this->db->affected_rows() != 1) ? false : true;

  }

  public function insert_id(){
    return $this->db->insert_id();
  }
}
