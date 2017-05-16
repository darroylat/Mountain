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
              $query = $this->db->get_where('CLIENTE', array('USUARIOCLIENTE' => $usuario, 'PASSCLIENTE' => $contrasena));
              return $query->row_array();
        }

        //Funcionando
        public function get_where_one($id){
            $query = $this->db->get_where('CLIENTE', array('IDCLIENTE' => $id));
            return $query->row_array();
        }

        public function update_cliente_registro($nombre, $usuario, $pass, $mail, $id)
        {
          $data['NOMBRECLIENTE']  = $nombre;
          $data['USUARIOCLIENTE'] = $usuario;
          $data['PASSCLIENTE']    = $pass;
          $data['MAILCLIENTE']    = $mail;
          $data['DATOSCLIENTE']   = 'MOUNTAIN_'.strtoupper($usuario);

          $query = $this->db->update('CLIENTE', $data, array('IDCLIENTE' => $id));
          if ($query) {
            $busqueda = $this->db->get_where('CLIENTE', array('IDCLIENTE' => $id));
            return $busqueda->row_array();
          }else{
            return null;
          }
        }

        public function buscando_usuario($usuario){
          $query = $this->db->get_where('CLIENTE', array('USUARIOCLIENTE' => $usuario));
          return $query->row_array();
        }

}
