<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

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
					$this->load->model('Contacto_model', 'contacto_m');
			}

	 private $defaultData = array(
 		'title'			=> 'Agencia',
 		'layout' 		=> 'plantilla/lytDefault',
 		'contentView' 	=> 'vUndefined',
 		'stylecss'		=> '',
 	);

   private function _renderView($data = array())
   {
     $data = array_merge($this->defaultData, $data);
     $this->load->view($data['layout'], $data);
   }

	 public function promotor() {
     $data = array();
     $data['contentView'] = 'contacto/contacto_promotor';
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
     $data = array();
     $data['contentView'] = 'contacto/lista_mensajes';
		 $data['layout'] = 'layout/lytDefault';
		 $data['lista'] = $this->contacto_m->obtenerListaMensajes();
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

	 public function enviar() {
		 $nombre = $this->input->post('name');
		 $nombre_agencia = $this->input->post('nombre-agencia');
		 $correo = $this->input->post('email');
		 $asunto = $this->input->post('subject');
		 $mensaje = $this->input->post('message');
		 $tipo = $this->input->post('sel-tipo');
		 $telefono = $this->input->post('telefono');
		 $servicios = $this->input->post('servicios');
		 $datos = array(
			 'nombre' => $nombre,
			 'nombre_agencia' => $nombre_agencia,
			 'correo' => $correo,
			 'asunto' => $asunto,
			 'mensaje' => $mensaje,
			 'respondido' => 0,
			 'tipo' => $tipo,
			 'telefono' => $telefono,
			 'servicios' => $servicios,
			 'fecha_creado' => date('Y-m-d H:i:s'),
		 );

		 if ($this->contacto_m->guardarMensaje($datos)) {
			 $this->session->set_userdata('success', 'Gracias por su mensaje, pronto obtendra una respuesta.');
			 if ($tipo=='promotor') {
			 	redirect('contacto/promotor');
			 }
			 redirect('contacto');
		 }

		 $this->session->set_userdata('danger', 'No se pudo enviar el mensaje.');
		 if ($tipo=='promotor') {
			redirect('contacto/promotor');
		 }
		 redirect('contacto');
	 }

	 public function index() {
     $data = array();
     $data['contentView'] = 'contacto/index';
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
