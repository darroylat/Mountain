<?php
class Pack_model extends CI_Model {
  public function __construct()	{
    $this->load->database();
  }
  
	public function Listapack(){
        	
        	$query=$this->db->query('SELECT *
									FROM PACK
									');
        	return $query->result();
        	
    }
    
    public function insert_pack($nombre,$descripcion, $valor, $fechainicio){

    $data['NOMBRE'] = $nombre;
    $data['DESCRIPCION'] = $descripcion;
    $data['VALOR'] = $valor;
    $data['FECHAINICIO'] = $fechainicio;
 
    //$data['FECHA'] = 'NOW()';
    $this->db->insert('PACK', $data);

    //return ($this->db->affected_rows() != 1) ? false : true;
	return $this->db->insert_id();
	}
  
	public function getPack($id){
	$query = $this->db->query("SELECT *
								FROM PACK
								WHERE IDPACK=".$id);
	
	//$query = $this->db->get_where('EVENTO',array('IDEVENTO' => $id));
    return $query->row();
	}
	
	public function getSenderosPack($id){
	$query = $this->db->query("SELECT O.NOMBRE FROM PACK P
								LEFT JOIN SENDEROPACK S
								ON P.IDPACK=S.IDPACK
								LEFT JOIN UBICACION O
								ON O.IDUBICACION=S.IDSENDERO
								WHERE P.IDPACK=".$id);
	
	//$query = $this->db->get_where('EVENTO',array('IDEVENTO' => $id));
    return $query->result();
	}
	
	public function getValorComprobantepack($id){
	$query = $this->db->query('SELECT COALESCE(SUM(E.VALOR),0) AS TOTAL,COALESCE((SELECT SUM(E.VALOR)
								FROM INSCRIPCIONPACK I, PACK E 
								WHERE I.IDPACK= E.IDPACK
								AND I.IDPACK= '.$id.'
								AND I.COMPROBANTE = 1 ),0) AS PAGO
								FROM INSCRIPCIONPACK I, PACK E 
								WHERE I.IDPACK= E.IDPACK
								AND I.IDPACK='.$id);
	return $query->row();
	}
	
	public function getValorPagadoPack($id){
	$query = $this->db->query('SELECT COALESCE(SUM(E.VALOR),0) AS TOTAL,COALESCE((SELECT SUM(E.VALOR)
								FROM INSCRIPCIONPACK I, PACK E 
								WHERE I.IDPACK= E.IDPACK
								AND I.IDPACK= '.$id.'
								AND I.COMPROBANTE = 2 ),0) AS PAGO
								FROM INSCRIPCIONPACK I, PACK E 
								WHERE I.IDPACK= E.IDPACK
								AND I.IDPACK='.$id);
	return $query->row();
	}
	
	public function getUsuariosInscritosPack($id){
	$query = $this->db->query("SELECT U.IDUSUARIO,CONCAT(U.NOMBRE,' ',U.APELLIDO) AS NOMBRE, I.COMPROBANTE 
								FROM PACK E
								JOIN INSCRIPCIONPACK I ON
								E.IDPACK= I.IDPACK
								JOIN USUARIO U ON
								U.IDUSUARIO = I.IDUSUARIO
								WHERE E.IDPACK=".$id);
	return $query->result();
	}
}
