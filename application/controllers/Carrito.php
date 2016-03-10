<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

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
				  $this->load->model('Cliente_model', 'cliente_m');
					$this->load->model('Orden_model', 'orden_m');
				require_once APPPATH."/third_party/OpenPay/Openpay.php";
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

	 public function pagar() {
     $data = array();
     $data['contentView'] = 'carrito/open_pay';
		 $data['layout' ] = 'plantilla/lytDefault';
     $this->_renderView($data);
  }

	 public function transaccion()
	 {
		 //Variables carrito
		 $total = $this->cart->total();

		 //Open pay-button
		 $monto = $total;
     $descripcion = 'Cargo de prueba';
     $token = $this->input->post('token_id');
     $use_points = $this->input->post('use_card_points');
     $device_session_id = $this->input->post('deviceIdHiddenFieldName');
     $openpay = Openpay::getInstance('mbbhthnfoofqpkzdjqyz', 'sk_9c0cda74d8ec44f6884796670593f36c');


	 	//Guardar cliente
		$correo = $this->input->post('correo-cliente');
		$nombre = $this->input->post('nombre-cliente');
		$ape_paterno = $this->input->post('ape-paterno');
		$ape_materno = $this->input->post('ape-materno');
		$telefono = $this->input->post('telefono');

		$cliente = array(
			'correo' => $correo,
			'nombre' => $nombre,
			'ape_paterno' => $ape_paterno,
			'ape_materno' => $ape_materno,
			'telefono' => $telefono,
			'fecha_creado' => date('Y-m-d H:i:s'),
		);

		$customer = array(
     'name' => $nombre,
     'last_name' => $ape_paterno,
     'phone_number' => $telefono,
     'email' => $correo,
	 );

		$cod_cliente = $this->cliente_m->guardarCliente($cliente);
		if ($cod_cliente) {

			//Guardar Cabecero
			$orden_cab = array(
				'cod_cliente' => $cod_cliente,
				'total' => $total,
				'fecha_orden' => date('Y-m-d H:i:s'),
				);

			$cod_orden = $this->orden_m->guardarCabOrden($orden_cab);
			if ($cod_orden) {
				//Guardar Detalle
				if ($cart = $this->cart->contents()):
	        foreach ($cart as $item):
						$orden_det = array(
							'cod_cab' => $cod_orden,
							'cod_paquete' => $item['id'],
							'cantidad' => $item['qty'],
							'subtotal' => $item['subtotal'],
							'fecha_orden' => date('Y-m-d H:i:s'),
						);
					$cod_det = $this->orden_m->guardarDetOrden($orden_det);

					endforeach;
	      endif;

				if ($cod_det) {

					$chargeData = array(
			        'method' => 'card',
			        'source_id' => $token,
			        'amount' => (float)$monto,
			        'description' => $descripcion,
			        'use_card_points' => $use_points, // Opcional, si estamos usando puntos
			        'device_session_id' => $device_session_id,
			        'customer' => $customer,
			        'currency' => 'MXN',
			        'order_id' => '00001',

			      );

						$this->cart->destroy();

			    $charge = $openpay->charges->create($chargeData);


					  echo "<pre>";die(print_r($charge));

				}else {
					echo "No se pudo guardar el detalle del pedido, intentelo de nuevo";
				}


			}else {
				echo "No se pudo guardar el cabecero del pedido, intentelo de nuevo";
			}
		}else {
			echo "No se pudo guardar el cliente, intentelo de nuevo";
		}


		//Realizar Transaccion
	 }

	 public function actualizar(){
    //echo "<pre>";die(print_r($_POST));
    $this->cart->update($_POST);
    //return true;
    redirect('carrito');
  }

	 public function eliminar($rowid)
	 {
    $this->cart->update(array('rowid'=>$rowid, 'qty'=>0));
    redirect('carrito');
  }

	 public function agregar()
	 {
		 $id = $this->input->post('id');
		 $precio =$this->input->post('price');
		 $nombre_paquete = $this->input->post('nombre-paquete');
		 $especificaciones = $this->input->post('especificaciones');
		 $datos_item = array(
	          'id' => $id,
	          'qty' => 1,
	          'price' => $precio,
	          'name' => $nombre_paquete,
	          'options' => array('Especificaciones' => $especificaciones),
	  );
	//	echo "<pre>";die(print_r($datos_item));
		$this->cart->insert($datos_item);
    redirect('carrito');
	 }

	 public function openpay() {
     $data = array();
     $data['contentView'] = 'carrito/open_pay';
		 $data['layout' ] = 'plantilla/lytVacio';
     $data['scripts'] = array('agencia');
     $this->_renderView($data);
  }

	 public function index() {
     $data = array();
     $data['contentView'] = 'carrito/index';
     $data['scripts'] = array('agencia');
     $this->_renderView($data);
  }
}
