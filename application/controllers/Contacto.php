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

	 public function index() {
     $data = array();
     $data['contentView'] = 'contacto/index';
     $data['scripts'] = array('agencia');
     $this->_renderView($data);
  }
}
