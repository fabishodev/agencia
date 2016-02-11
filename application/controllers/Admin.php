<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->model('Usuario_model', 'usuario_m');
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

	 public function ingresarUsuario(){

     $usuario = $this->usuario_m->obtenerUsuarioIngreso($this->input->post('correo-usuario'), $this->input->post('pass-usuario'));
     $data = array();
     if ($usuario) {
       //die(print_r($usuario));
       $this->session->set_userdata('tipo_usuario', $usuario->cod_tipo);
       $this->session->set_userdata('id_usuario', $usuario->id);
       $this->session->set_userdata('correo', $usuario->correo);
       $this->session->set_userdata('nombre_completo', $usuario->nombre.' '.$usuario->ape_paterno.' '.$usuario->ape_materno);
      $this->session->set_userdata('danger', '');
       if ($usuario->cod_tipo == 0) {
         	redirect('admin/index');
       }else {
         redirect('inicio/index');
       }

     }else {
       $this->session->set_userdata('danger', 'No existe cuenta. Verifique correo y contraseña.');
       redirect('/admin/ingresar');
     }

   }

	public function index()
	{
		if (!$this->session->userdata('correo') ) {
					 $this->session->sess_destroy();
					 redirect('admin/ingresar');
			 }
		$data = array();
		$data['contentView'] = 'admin/index';
		$data['scripts'] = array('agencia');
		$this->_renderView($data);
	}

	public function ingresar()
	{
		if ($this->session->userdata('correo') ) {
					 redirect('admin/index');
			 }

		$data = array();
		$data['contentView'] = 'admin/ingresar';
		$data['scripts'] = array('agencia');
		$data['danger'] = '';
    if ($this->session->userdata('danger')) {
      $danger = $this->session->userdata('danger');
      $data['danger'] = $danger;
    }
		// View render
		$this->_renderView($data);
	}
}
