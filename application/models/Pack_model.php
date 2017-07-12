<?php
class Pack_model extends CI_Model {
  public function __construct()	{
    $this->load->database();
  }
  
	public function Listapack(){
        	
        	$query=$this->db->query('SELECT *,COALESCE((SELECT COUNT(IDINSCRIPCIONPACK) FROM
										INSCRIPCIONPACK WHERE IDPACK=PACK.IDPACK),0) AS CNTINSCRITOS
FROM PACK 
ORDER BY IDPACK DESC');
        	return $query->result();
        	
    }
    
    public function insert_pack($nombre,$descripcion, $valor, $fechainicio,$fechacierre){

    $data['NOMBRE'] = $nombre;
    $data['DESCRIPCION'] = $descripcion;
    $data['VALOR'] = $valor;
    $data['FECHAINICIO'] = $fechainicio;
 	$data['FECHACIERRE'] = $fechacierre;
    //$data['FECHA'] = 'NOW()';
    $this->db->insert('PACK', $data);

    //return ($this->db->affected_rows() != 1) ? false : true;
	return $this->db->insert_id();
	}
	public function insert_pack_senderos($idpack,$idsendero){

    $data['IDPACK'] = $idpack;
    $data['IDSENDERO'] = $idsendero;
 
    //$data['FECHA'] = 'NOW()';
    $this->db->insert('SENDEROPACK', $data);

    //return ($this->db->affected_rows() != 1) ? false : true;
	return $idpack;
	}
  
	public function getPack($id){
	$query = $this->db->query("SELECT *
								FROM PACK
								WHERE IDPACK=".$id);
	
	//$query = $this->db->get_where('EVENTO',array('IDEVENTO' => $id));
    return $query->row();
	}
	
	public function getSenderosPack($id){
	$query = $this->db->query("SELECT U.NOMBRE FROM 
								PACK P 
								LEFT JOIN SENDEROPACK SP
								ON SP.IDPACK=P.IDPACK
								LEFT JOIN SENDERO S
								ON S.IDSENDERO=SP.IDSENDERO
								LEFT JOIN UBICACION U
								ON U.IDUBICACION=S.IDUBICACION
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
	$query = $this->db->query("SELECT U.IDUSUARIO,CONCAT(U.NOMBRE,' ',U.APELLIDO) AS NOMBRE, I.COMPROBANTE,U.IDNIVEL
								FROM PACK E
								JOIN INSCRIPCIONPACK I ON
								E.IDPACK= I.IDPACK
								JOIN USUARIO U ON
								U.IDUSUARIO = I.IDUSUARIO
								WHERE E.IDPACK=".$id);
	return $query->result();
	}
	public function countPackActivos(){
    	
    	$query=$this->db->query('SELECT COUNT(IDPACK) AS CONTADOR from PACK
    	where ESTADOPACK=0');
    	return $query->row_array();
    	
    }
    public function countPackCerradas(){
    	
    	$query=$this->db->query('SELECT COUNT(IDPACK) AS CONTADOR from PACK
    	where ESTADOPACK=1');
    	return $query->row_array();
    	
    }
    public function countPackCanceladas(){
    	
    	$query=$this->db->query('SELECT COUNT(IDPACK) AS CONTADOR from PACK
    	where ESTADOPACK=2');
    	return $query->row_array();
    	
    }
	public function resumenpacksactivas(){
		$query = $this->db->query('SELECT 
									sum(case when COMPROBANTE = 0 then 1 else 0 end) AS INSCRITO,
									sum(case when COMPROBANTE = 1 then 1 else 0 end) AS CONFIRMAR,
									sum(case when COMPROBANTE = 2 then 1 else 0 end) AS PAGADO
									FROM INSCRIPCIONPACK
									WHERE IDPACK IN (SELECT IDPACK FROM PACK WHERE ESTADOPACK=0)');
		return $query->row();
	}
	public function getAuto($id){
		$query = $this->db->query('SELECT COUNT(U.IDUSUARIO) AS AUTO
								FROM PACK P
								JOIN INSCRIPCIONPACK I ON
								P.IDPACK= I.IDPACK
								JOIN USUARIO U ON
								U.IDUSUARIO = I.IDUSUARIO
								WHERE P.IDPACK='.$id.' AND U.AUTOCOMPAR = 1');
		return $query->row();
	}
}
