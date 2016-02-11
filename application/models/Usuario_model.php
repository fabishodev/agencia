<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class Usuario_model extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE);
    }

    function obtenerUsuarioIngreso($email, $pass){
        //$pass = md5($pass);
        $where = "correo ='".$email."' AND password = '".$pass."' AND activo = 1";
        $this->db->select('*');
        $this->db->from('cat_usuarios');
        if ($where != NULL) {
          $this->db->where($where, NULL, FALSE);
        }
  			$query = $this->db->get();
  			//echo "<pre>";die(print($where));
  			return $query->row();
      }
  }
