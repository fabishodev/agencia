<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class Paquete_model extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE);
    }

    function eliminarImagenPaquete($id) {
      //die(print_r($serv));
        $this->db->trans_begin();
      $this->db->where('id', $id);
      $this->db->delete('galeria_paquetes');
        if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        return FALSE;
      } else {
        $this->db->trans_commit();
        return TRUE;
      }
    }

    function obtenerImagenPaquete($id){
			$where = "id = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('galeria_paquetes');
			return $query->row();
		}

    function obtenerGaleriaPaquete($id){
			$where = "cod_paquete = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('galeria_paquetes');
			return $query->result();
		}

    function guardarImagenPaquete($serv = array()){
			$this->db->trans_begin();
			$this->db->insert('galeria_paquetes', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			 } else {
			  $this->db->trans_commit();
			   return TRUE;
		  }
	 }

    function obtenerPaquetes(){
			$where = "estatus = 1";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('cat_paquetes');
			return $query->result();
		}

    function actualizarPaquete($serv = array(),$id){
			$this->db->trans_begin();
      $this->db->where('id', $id);
      $this->db->update('cat_paquetes', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			 } else {
			  $this->db->trans_commit();
			   return TRUE;
		  }
	 }

    function obtenerDetallePaquete($id){
			$where = "id = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('cat_paquetes');
			return $query->row();
		}

    function guardarPaquete($serv = array()){
			$this->db->trans_begin();
			$this->db->insert('cat_paquetes', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			 } else {
			  $this->db->trans_commit();
			   return TRUE;
		  }
	 }

    function obtenerListaPaquetes(){
			$where = "";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('cat_paquetes');
			return $query->result();
		}

}
