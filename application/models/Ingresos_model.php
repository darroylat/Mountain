<?php
class Ingresos_model extends CI_Model {
  public function __construct()	{
    $this->load->database();
  }


	public function Listaeventos(){
        	
        	$query=$this->db->query('SELECT E.IDEVENTO,E.NOMBRE,
									sum(case when I.COMPROBANTE = 0 then VALOR else 0 end) AS INSCRITO,
									sum(case when I.COMPROBANTE = 1 then VALOR  else 0 end) AS CONFIRMAR,
									sum(case when I.COMPROBANTE = 2 then VALOR  else 0 end) AS PAGADO,
									E.ESTADO,
									COALESCE(sum(case when I.COMPROBANTE in (0,1,2) then VALOR  else 0 end),0) AS TOTAL
									 FROM EVENTO E
									
									LEFT OUTER JOIN INSCRIPCIONEVENTO I
									 ON I.IDEVENTO=E.IDEVENTO
									GROUP BY E.IDEVENTO,E.NOMBRE');
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
  public function resumensalidasactivas(){
		$query = $this->db->query('SELECT 
									sum(case when I.COMPROBANTE = 0 then VALOR else 0 end) AS INSCRITO,
									sum(case when I.COMPROBANTE = 1 then VALOR  else 0 end) AS CONFIRMAR,
									sum(case when I.COMPROBANTE = 2 then VALOR  else 0 end) AS PAGADO,
									E.ESTADO,
									COALESCE(sum(case when I.COMPROBANTE in (0,1,2) then VALOR  else 0 end),0) AS TOTAL
									 FROM EVENTO E
									
									LEFT OUTER JOIN INSCRIPCIONEVENTO I
									 ON I.IDEVENTO=E.IDEVENTO
									where E.ESTADO=0');
		return $query->row();
	}
	public function Listapacks(){
        	
        	$query=$this->db->query('SELECT E.IDPACK,E.NOMBRE,
									sum(case when I.COMPROBANTE = 0 then VALOR else 0 end) AS INSCRITO,
									sum(case when I.COMPROBANTE = 1 then VALOR  else 0 end) AS CONFIRMAR,
									sum(case when I.COMPROBANTE = 2 then VALOR  else 0 end) AS PAGADO,
									E.ESTADOPACK,
									COALESCE(sum(case when I.COMPROBANTE in (0,1,2) then VALOR  else 0 end),0) AS TOTAL
									 FROM PACK E
									
									LEFT OUTER JOIN INSCRIPCIONPACK I
									 ON I.IDPACK=E.IDPACK
									GROUP BY E.IDPACK,E.NOMBRE');
        	return $query->result();
        	
    }
     public function resumenPackactivas(){
		$query = $this->db->query('SELECT 
									sum(case when I.COMPROBANTE = 0 then VALOR else 0 end) AS INSCRITO,
									sum(case when I.COMPROBANTE = 1 then VALOR  else 0 end) AS CONFIRMAR,
									sum(case when I.COMPROBANTE = 2 then VALOR  else 0 end) AS PAGADO,
									E.ESTADOPACK,
									COALESCE(sum(case when I.COMPROBANTE in (0,1,2) then VALOR  else 0 end),0) AS TOTAL
									FROM PACK E
									LEFT OUTER JOIN INSCRIPCIONPACK  I
									ON I.IDPACK=E.IDPACK
									where E.ESTADOPACK=0');
		return $query->row();
	}
	public function resumenEstadoPack(){
		$query = $this->db->query('SELECT 
									sum(case when P.ESTADOPACK= 0 then 1 else 0 end) AS ACTIVAS,
									sum(case when P.ESTADOPACK= 1 then 1 else 0 end) AS DESCATIVADAS,
									sum(case when P.ESTADOPACK= 2 then 1 else 0 end) AS ELIMINADAS
									FROM PACK P
									');
		return $query->row();
	}
  
}
