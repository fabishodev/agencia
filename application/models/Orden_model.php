<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class Orden_model extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE);
    }

    function guardarDetOrden($serv = array()){
			$this->db->trans_begin();
			$this->db->insert('orden_detalle', $serv);
      $id = $this->db->insert_id();
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			} else {
			$this->db->trans_commit();

			return (isset($id)) ? $id : FALSE;
		}
	}

    function guardarCabOrden($serv = array()){
			$this->db->trans_begin();
			$this->db->insert('orden_cabecero', $serv);
      $id = $this->db->insert_id();
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			} else {
			$this->db->trans_commit();

			return (isset($id)) ? $id : FALSE;
		}
	}
}
