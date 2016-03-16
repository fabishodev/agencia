<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class Contacto_model extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE);
    }



    function guardarMensaje($serv = array()){
			$this->db->trans_begin();
			$this->db->insert('contacto_mensaje', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			 } else {
			  $this->db->trans_commit();
			   return TRUE;
		  }
	 }

    function obtenerListaMensajes(){
			$where = "";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('contacto_mensaje');
			return $query->result();
		}

}
