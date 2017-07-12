<?php
class Ubicacion_model extends CI_Model {

  public function __construct()	{
    $this->load->database();
  }

  public function insert_ubicacion($nombre, $caracteristica, $informacion, $riesgo, $utiles,
                                  $equipo, $recomendacion, $costo, $ruta){
    $data['NOMBRE'] = $nombre;
    $data['CARACTERISTICA'] = $caracteristica;
    $data['INFORMACION'] = $informacion;
    $data['RIESGOS'] = $riesgo;
    $data['DATOSUTILES'] = $utiles;
    $data['EQUIPSUGERIDO'] = $equipo;
    $data['RECOMENDACION'] = $recomendacion;
    $data['COSTO'] = $costo;
    $data['RUTAS'] = $ruta;
    //$data['FECHA'] = 'NOW()';
    $this->db->insert('UBICACION', $data);

    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function all_ubicacion(){
    $query = $this->db->get('UBICACION');
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return FALSE;
    }

  }
  public function listalugares(){
        	
        	$query=$this->db->query('SELECT * FROM UBICACION');
        	return $query;
        	
        }
}
