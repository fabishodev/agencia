<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class Categoria_model extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE);
    }

    function actualizarCategoria($serv = array(),$id){
			$this->db->trans_begin();
      $this->db->where('id', $id);
      $this->db->update('cat_categorias', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			 } else {
			  $this->db->trans_commit();
			   return TRUE;
		  }
	 }

    function obtenerDetalleCategoria($id){
			$where = "id = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('cat_categorias');
			return $query->row();
		}

    function guardarCategoria($serv = array()){
			$this->db->trans_begin();
			$this->db->insert('cat_categorias', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			 } else {
			  $this->db->trans_commit();
			   return TRUE;
		  }
	 }

    function obtenerListaCategorias(){
			$where = "";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('cat_categorias');
			return $query->result();
		}

}
