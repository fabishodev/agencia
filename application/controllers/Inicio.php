<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

   function __construct() {
        parent::__construct();
        $this->load->model('Paquete_model', 'paquete_m');
    }

   private $defaultData = array(
 		'title'			=> 'Agencia',
 		'layout' 		=> 'layout/lytDefault',
 		'contentView' 	=> 'vUndefined',
 		'stylecss'		=> '',
 	  );

  private function _renderView($data = array())
  {
    $data = array_merge($this->defaultData, $data);
    $this->load->view($data['layout'], $data);
  }

  public function index()
	{
    $data = array();
    $data['contentView'] = 'inicio/index';
    $data['paquetes'] = $this->paquete_m->obtenerPaquetes();
    $data['scripts'] = array('agencia');
    $data['success'] = '';
    if ($this->session->userdata('success')) {
      $success = $this->session->userdata('success');
      $data['success'] = $success;
    }
    $data['danger'] = '';
    if ($this->session->userdata('danger')) {
      $danger = $this->session->userdata('danger');
      $data['danger'] = $danger;
    }
    $this->_renderView($data);
	}
}
