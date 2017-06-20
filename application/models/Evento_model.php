<?php
class Evento_model extends CI_Model {
  public function __construct()	{
    $this->load->database();
  }

  public function insert_evento($sendero,$nombre, $descripcion, $fecha, $hora, $fechacierre, $valor, $punto, $foto){

    $data['IDSENDERO'] = $sendero;
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

    //return ($this->db->affected_rows() != 1) ? false : true;
	return $this->db->insert_id();
  }
  public function insert_equipo($idequipo,$idsendero){

    $data['IDEQUIPOTRECK'] = $idequipo;
    $data['IDEVENTO'] = $idsendero;
    //$data['FECHA'] = 'NOW()';
    $this->db->insert('EQUIPOEVENTO', $data);

    return $idsendero;

  }

  public function insert_id(){
  	
  	
    return $this->db->insert_id();
  }
  
  public function contadorUbicacion(){
		
		$query = $this->db->get('UBICACION','*');
		//$this->db->query('SELECT * FROM UBICACION');
		return $query;
	}
	// CONSULTAS DE EVENTO
	public function getEvento($id){
		$query = $this->db->query("SELECT NOMBRE, DESCRIPCION, FECHA, HORA, DATE_FORMAT(FECHACIERRE, '%d-%m-%Y') AS FECHACIERRE, PUNTO
									FROM EVENTO
									WHERE IDEVENTO=".$id);
		
		//$query = $this->db->get_where('EVENTO',array('IDEVENTO' => $id));
        return $query->row();
	}
	public function getValorComprobanteEvento($id){
		$query = $this->db->query('SELECT COALESCE(SUM(E.VALOR),0) AS TOTAL, COALESCE(
									(SELECT SUM(E.VALOR)
									FROM INSCRIPCIONEVENTO I, EVENTO E 
									WHERE I.IDEVENTO = E.IDEVENTO 
									AND I.IDEVENTO = '.$id.'
									AND I.COMPROBANTE = 1
									),0) AS PAGO
									FROM INSCRIPCIONEVENTO I, EVENTO E 
									WHERE I.IDEVENTO = E.IDEVENTO 
									AND I.IDEVENTO ='.$id);
		return $query->row();
	}
	public function getValorPagadoEvento($id){
		$query = $this->db->query('SELECT COALESCE(SUM(E.VALOR),0) AS TOTAL, COALESCE(
									(SELECT SUM(E.VALOR)
									FROM INSCRIPCIONEVENTO I, EVENTO E 
									WHERE I.IDEVENTO = E.IDEVENTO 
									AND I.IDEVENTO = '.$id.'
									AND I.COMPROBANTE = 2
									),0) AS PAGO
									FROM INSCRIPCIONEVENTO I, EVENTO E 
									WHERE I.IDEVENTO = E.IDEVENTO 
									AND I.IDEVENTO = '.$id);
		return $query->row();
	}
	public function getUsuariosInscritos($id){
		$query = $this->db->query("SELECT U.IDUSUARIO,CONCAT(U.NOMBRE,' ',U.APELLIDO) AS NOMBRE, I.COMPROBANTE, U.IDNIVEL 
									FROM EVENTO E
									JOIN INSCRIPCIONEVENTO I ON
									E.IDEVENTO = I.IDEVENTO
									JOIN USUARIO U ON
									U.IDUSUARIO = I.IDUSUARIO
									WHERE E.IDEVENTO = ".$id);
		return $query->result();
	}
	public function getSenderoUbicacion($id){
		$query = $this->db->query('SELECT U.NOMBRE AS NOMBREUBICACION, U.INFORMACION, S.NOMBRE AS NOMBRESENDERO, U.CARACTERISTICA, U.RIESGOS
								FROM EVENTO E
								JOIN SENDERO S ON
								E.IDSENDERO = S.IDSENDERO
								JOIN UBICACION U ON
								S.IDUBICACION = U.IDUBICACION
								WHERE E.IDEVENTO = '.$id);
		return $query->row();
	}
	public function getEquipoEvento($id){
		$query = $this->db->query('SELECT M.IDEQUIPOTRECK AS ID ,M.DESCRIPCION 
								FROM EQUIPOEVENTO E
								JOIN MAESTROEQUIPO M ON
								E.IDEQUIPOTRECK = M.IDEQUIPOTRECK
								WHERE E.IDEVENTO ='.$id);
		return $query->result();
	}
	public function getAuto($id){
		$query = $this->db->query('SELECT COUNT(U.IDUSUARIO) AS AUTO
								FROM EVENTO E
								JOIN INSCRIPCIONEVENTO I ON
								E.IDEVENTO = I.IDEVENTO
								JOIN USUARIO U ON
								U.IDUSUARIO = I.IDUSUARIO
								WHERE E.IDEVENTO ='.$id.' AND U.AUTOCOMPAR = 1');
		return $query->row();
	}
	public function Listaeventos(){
        	
        	$query=$this->db->query('SELECT IDEVENTO,NOMBRE,FECHA,HORA,FECHACIERRE,PUNTO,VALOR,ESTADO from EVENTO order by FECHAREGISTRO DESC');
        	return $query->result();
        	
    }
    public function counteventosActivos(){
    	
    	$query=$this->db->query('SELECT COUNT(IDEVENTO) AS CONTADOR from EVENTO
    	where ESTADO=0');
    	return $query->row_array();
    	
    }
    public function counteventosCerradas(){
    	
    	$query=$this->db->query('SELECT COUNT(IDEVENTO) AS CONTADOR from EVENTO
    	where ESTADO=1');
    	return $query->row_array();
    	
    }
    public function counteventosCanceladas(){
    	
    	$query=$this->db->query('SELECT COUNT(IDEVENTO) AS CONTADOR from EVENTO
    	where ESTADO=2');
    	return $query->row_array();
    	
    }
  
}
