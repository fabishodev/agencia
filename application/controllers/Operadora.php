<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operadora extends CI_Controller {

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
				$this->load->model('Operadora_model', 'operadora_m');
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

  public function editar($id)
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
         }

       $nombre = $this->input->post('nombre');
       $correo = $this->input->post('correo');
       $telefono = $this->input->post('telefono');
       $domicilio = $this->input->post('domicilio');
       $colonia = $this->input->post('colonia');
       $ciudad = $this->input->post('ciudad');
       $activo = $this->input->post('estatus');

        $datos = array(
          'nombre_operadora' => trim($nombre),
          'correo' => trim($correo),
          'telefono' => trim($telefono),
          'domicilio' => trim($domicilio),
          'colonia' => trim($colonia),
          'ciudad' => trim($ciudad),
          'activo' => $activo,
          'fecha_actualizado' => date('Y-m-d H:i:s'),
        );

    if ($this->operadora_m->actualizarOperadora($datos,$id)) {
      $this->session->set_userdata('success', 'Operadora guardada correctamente.');
      redirect('operadora/detalle/'.$id);
    }

  }

  public function agregar()
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $nombre = $this->input->post('nombre');
    $correo = $this->input->post('correo');
    $telefono = $this->input->post('telefono');
    $domicilio = $this->input->post('domicilio');
    $colonia = $this->input->post('colonia');
    $ciudad = $this->input->post('ciudad');
    $datos = array(
      'nombre_operadora' => trim($nombre),
      'correo' => trim($correo),
      'telefono' => trim($telefono),
      'domicilio' => trim($domicilio),
      'colonia' => trim($colonia),
      'ciudad' => trim($ciudad),
      'cod_usuario' => 1,
      'activo' => 1,
      'fecha_creado' => date('Y-m-d H:i:s'),
    );
    
    if ($this->operadora_m->guardarOperadora($datos)) {
      $this->session->set_userdata('success', 'Operadora guardada correctamente.');
      redirect('operadora/lista');
    }

  }

  public function detalle($id)
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $data = array();
    $data['contentView'] = 'operadora/detalle_operadora';
    $data['detalle'] = $this->operadora_m->obtenerDetalleOperadora($id);
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

   public function nueva() {

     if (!$this->session->userdata('correo') ) {
            $this->session->sess_destroy();
            redirect('admin/ingresar');
        }

     $data = array();
     $data['contentView'] = 'operadora/nueva_operadora';
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

   public function lista() {

     if (!$this->session->userdata('correo') ) {
            $this->session->sess_destroy();
            redirect('admin/ingresar');
        }

     $data = array();
     $data['contentView'] = 'operadora/lista_operadoras';
     $data['lista'] = $this->operadora_m->obtenerListaOperadoras();
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

   public function index() {
     if (!$this->session->userdata('correo') ) {
            $this->session->sess_destroy();
            redirect('admin/ingresar');
        }

     redirect('operadora/lista');
  }
 }
