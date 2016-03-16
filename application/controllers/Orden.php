<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orden extends CI_Controller {

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
        $this->load->model('Orden_model', 'orden_m');
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

  public function detalle($id)
	{
		if (!$this->session->userdata('correo') ) {
					 $this->session->sess_destroy();
					 redirect('admin/ingresar');
			}
		$data = array();
		$data['contentView'] = 'orden/detalle_orden';
    $data['cabecero'] = $this->orden_m->obtenerOrdenCab($id);
    $data['detalle'] = $this->orden_m->obtenerOrdenDet($id);
		$data['scripts'] = array('agencia');
		$this->_renderView($data);
	}

  public function lista()
	{
		if (!$this->session->userdata('correo') ) {
					 $this->session->sess_destroy();
					 redirect('admin/ingresar');
			}
		$data = array();
		$data['contentView'] = 'orden/lista_ordenes';
    $data['lista'] = $this->orden_m->obtenerListaOrdenesCab();
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

  public function index()
	{
		if (!$this->session->userdata('correo') ) {
					 $this->session->sess_destroy();
					 redirect('admin/ingresar');
			}
		$data = array();
		$data['contentView'] = 'orden/index';
		$data['scripts'] = array('agencia');
		$this->_renderView($data);
	}
}
