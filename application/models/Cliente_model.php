<?php
class Cliente_model extends CI_Model {

        public $idcliente;
        public $usuariocliente;
        public $passcliente;
        public $mailcliente;
        public $recibircliente;
        public $nombrecliente;

        public function __construct()	{
          $this->load->database();
        }

        public function select_cuenta_usuario($usuario, $contrasena){
              $query = $this->db->get_where('cliente', array('usuariocliente' => $usuario, 'passcliente' => $contrasena));
              return $query->row_array();
        }

        //Funcionando
        public function get_where_one($id){
            $query = $this->db->get_where('cliente', array('idcliente' => $id));
            return $query->row_array();
        }

}
