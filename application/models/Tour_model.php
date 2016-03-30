<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class Tour_model extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE);
    }

    function obtenerVigenciaTour($id){
      $where = "id = ".$id."";
      $this->db->select('vigencia');
      if($where != NULL){
          $this->db->where($where,NULL,FALSE);
      }
      $query = $this->db->get('cat_tours');
      return $query->row();
    }

    function eliminarDiasSalidas($id) {
      //die(print_r($serv));
        $this->db->trans_begin();
      $this->db->where('cod_tour', $id);
      $this->db->delete('dias_salidas_tours');
        if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        return FALSE;
      } else {
        $this->db->trans_commit();
        return TRUE;
      }
    }

    function obtenerDiasSalidas($id){
			$where = "cod_tour = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('dias_salidas_tours');
			return $query->result();
		}

    function guardarDiaSalida($serv = array()){
      $this->db->trans_begin();
      $this->db->insert('dias_salidas_tours', $serv);
      if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return FALSE;
       } else {
        $this->db->trans_commit();
      }
   }

    function obtenerLugaresDisponibles($id, $fecha){
      $query = $this->db->query("SELECT IFNULL(b.max_reservaciones - COUNT(*),0) AS lugares_disponibles
      FROM vw_orden_detalle a
      LEFT JOIN cat_tours b ON (a.cod_paquete=b.id)
      WHERE fecha_reservacion = '".$fecha."' AND b.id = ".$id."");
      //var_dump($query);
      //$str = $this->db->last_query();
    //die(print($str));
      return $query->row();

    }

    function eliminarImagenTour($id) {
      //die(print_r($serv));
        $this->db->trans_begin();
      $this->db->where('id', $id);
      $this->db->delete('galeria_tours');
        if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        return FALSE;
      } else {
        $this->db->trans_commit();
        return TRUE;
      }
    }

    function obtenerImagenTour($id){
			$where = "id = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('galeria_tours');
			return $query->row();
		}

    function obtenerGaleriaTour($id){
			$where = "cod_tour = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('galeria_tours');
			return $query->result();
		}

    function guardarImagenTour($serv = array()){
			$this->db->trans_begin();
			$this->db->insert('galeria_tours', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			 } else {
			  $this->db->trans_commit();
			   return TRUE;
		  }
	 }

    function obtenerTours(){
			$where = "estatus = 1";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('cat_tours');
			return $query->result();
		}

    function actualizarTour($serv = array(),$id){
			$this->db->trans_begin();
      $this->db->where('id', $id);
      $this->db->update('cat_tours', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			 } else {
			  $this->db->trans_commit();
			   return TRUE;
		  }
	 }

    function obtenerDetalleTour($id){
			$where = "id = ".$id."";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('cat_tours');
			return $query->row();
		}

    function guardarTour($serv = array()){
			$this->db->trans_begin();
			$this->db->insert('cat_tours', $serv);
			if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
			 } else {
			  $this->db->trans_commit();
			  return (isset($id)) ? $id : FALSE;
		  }
	 }

    function obtenerListaTours(){
			$where = "";
			$this->db->select('*');
			if($where != NULL){
					$this->db->where($where,NULL,FALSE);
			}
			$query = $this->db->get('cat_tours');
			return $query->result();
		}

}
