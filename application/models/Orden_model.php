<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class Orden_model extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE);
    }

    function obtenerOrdenDet($id){
			$where = "id_orden = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('vw_orden_detalle ');
			return $query->result();
		}

    function obtenerOrdenCab($id){
			$where = "id_orden = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('vw_orden_cabecero ');
			return $query->row();
		}

    function obtenerListaOrdenesCab(){
			$where = "";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('vw_orden_cabecero ');
			return $query->result();
		}

    function actualizarOrdenCab($serv = array(),$cod_orden) {
		//die(print_r($serv));
			$this->db->trans_begin();
		$this->db->where('id', $cod_orden);
		$this->db->update('orden_cabecero', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return TRUE;
		}
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
