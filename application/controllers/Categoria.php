<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

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
        $this->load->model('Categoria_model', 'categoria_m');
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

  public function salir() {
     $this->session->sess_destroy();
     $data = array();
     redirect('admin/ingresar');
     $this->_renderView($data);
 }

  public function editarCategoria($id)
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $nombre = $this->input->post('nombre');
    $descripcion = $this->input->post('descripcion');
    $datos = array(
      'nombre' => trim($nombre),
      'descripcion' => trim($descripcion),
      'fecha_actualizado' => date('Y-m-d H:i:s'),
    );
    if ($this->categoria_m->actualizarCategoria($datos,$id)) {
      $this->session->set_userdata('success', 'Categoria guardada correctamente.');
      redirect('categoria/detalle/'.$id);
    }
  }

  public function detalle($id)
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $data = array();
    $data['contentView'] = 'categoria/detalle_categoria';
    $data['detalle'] = $this->categoria_m->obtenerDetalleCategoria($id);
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

  public function agregarNueva()
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $nombre = $this->input->post('nombre');
    $descripcion = $this->input->post('descripcion');
    $datos = array(
      'nombre' => trim($nombre),
      'descripcion' => trim($descripcion),
      'cod_usuario' => 1,
      'estatus' => 1,
      'fecha_creado' => date('Y-m-d H:i:s'),
    );
    if ($this->categoria_m->guardarCategoria($datos)) {
      $this->session->set_userdata('success', 'Categoria guardada correctamente.');
      redirect('categoria/lista');
    }
  }

  public function nueva()
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $data = array();
    $data['contentView'] = 'categoria/nueva_categoria';
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

  public function lista()
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $data = array();
    $data['contentView'] = 'categoria/lista_categorias';
    $data['lista'] = $this->categoria_m->obtenerListaCategorias();
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
    $data['contentView'] = 'categoria/index';
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
