<?php
class Admin_model extends CI_Model {

        public $id;
        public $title;
        public $content;
        public $date;

        public function __construct()	{
          $this->load->database();
        }
        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

        public function insert_entry($nombre, $usuario, $pass, $mail)
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }
        public function select_cuenta_usuario($usuario){
                $this->db->get_where_one('CLIENTE', array('USUARIOCLIENTE' => $usuario ));
        }
        public function update_entry($nombre, $usuario, $pass, $mail, $id)
        {
                $data['nombrecliente']  = $nombre;
                $data['usuariocliente'] = $usuario;
                $data['passcliente']    = $pass;
                $data['mailcliente']    = $mail;
                $data['datoscliente']   = 'MOUNTAIN_'.strtoupper($usuario);

                $query = $this->db->update('CLIENTE', $data, array('IDCLIENTE' => $id));
                return $query;
        }
        //Funcionando
        public function get_where_one($id){
            $query = $this->db->get_where('CLIENTE',array('IDCLIENTE' => $id));
            return $query->row_array();
        }



}
