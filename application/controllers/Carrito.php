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
					$this->load->model('Tour_model', 'tour_m');
					$this->load->model('Paquete_model', 'paquete_m');
					$this->load->library('Mensaje');
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

	 public function actualizar_orden($id, $transaccion, $status, $autorizacion)
	 {
	 	$datos = array(
			'id_respuesta' => $transaccion,
			'status_respuesta' => $status,
			'autorizacion_respuesta' => $autorizacion,
		);
		if ($this->orden_m->actualizarOrdenCab($datos,$id)) {
			return TRUE;
		}else {
			return FALSE;
		}
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
				$caracteres = array('-e','-m','-a','-','e','m','a');
				if ($cart = $this->cart->contents()):
	        foreach ($cart as $item):
						if ($this->cart->has_options($item['rowid']) == TRUE):
              foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value):
                 if ($option_name == 'Tarifa') {
                   $tipo_tarifa = $option_value;
                 }
								 if ($option_name == 'Tipo') {
                   $tipo_orden = $option_value;
                 }
								 if ($option_name == 'Fecha Reservación') {
                   $fecha_reservacion = $option_value;
                 }
               endforeach;
             endif;

						$id = str_replace($caracteres,"", $item['id']);
						$orden_det = array(
							'cod_cab' => $cod_orden,
							'cod_paquete' => $id,
							'tipo_orden' => $tipo_orden,
							'tipo_tarifa' => $tipo_tarifa,
							'cantidad' => $item['qty'],
							'subtotal' => $item['subtotal'],
							'fecha_reservacion' => $fecha_reservacion,
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
			        'order_id' => $cod_orden,

			      );

						//$this->cart->destroy();
					try {
						$charge = $openpay->charges->create($chargeData);

							if ($charge) {
								$id_respuesta = $charge->id;
								$status_respuesta = $charge->status;
								$autorizacion_respuesta = $charge->authorization;
								$error_message = $charge->error_message;
								$this->actualizar_orden($cod_orden,$id_respuesta,$status_respuesta,$autorizacion_respuesta);
								if ($status_respuesta=='completed') {
									if (!$this->mensaje->EnviarCorreoConfirmacionTransaccion($nombre, $correo, $id_respuesta)) {
					          $this->session->set_userdata('danger', 'Error al enviar correo de transaccion.');
					        }
									$this->cart->destroy();
									$this->session->set_userdata('success', 'Gracias por su preferencia.');
									redirect('carrito');
								}
								$this->cart->destroy();
								$this->session->set_userdata('danger', 'No se pudo realizar la transaccion.');
								redirect('carrito');

							}else {
								$this->session->set_userdata('danger', 'No se pudo realizar el pago, intentelo de nuevo.');
								redirect('carrito');
								$this->cart->destroy();
							}

					} catch (Exception $e) {
						//var_dump($e);
						$this->session->set_userdata('danger', 'No se pudo realizar la transaccion, intentelo de nuevo.');
						redirect('carrito');
					}

				}else {
					$this->session->set_userdata('danger', 'No se pudo guardar el detalle del pedido, intentelo de nuevo.');
					redirect('carrito');
				}


			}else {
				$this->session->set_userdata('danger', 'No se pudo guardar el cabecero del pedido, intentelo de nuevo.');
				redirect('carrito');

			}
		}else {
			$this->session->set_userdata('danger', 'No se pudo guardar el cliente, intentelo de nuevo.');
			redirect('carrito');

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
		 $tipo_tarifa = $this->input->post('tipo-tarifa');
		 $tipo = $this->input->post('tipo');
		 $fecha = $this->input->post('fecha-reservacion');
		 if ($tipo == 'tour') {
		 	$detalle = $this->tour_m->obtenerDetalleTour($id);
			$fecha_reservacion = date('Y-m-d',  strtotime($fecha));
			switch ($tipo_tarifa) {
 		 	case 'estandar':
 		 		$cod = $id.'-e';
 				$tarifa = $detalle->tarifa_publica;
 		 		break;

 			case 'menor':
 			 	$cod = $id.'-m';
 				$tarifa = $detalle->precio_menor;
 			 	break;

 			case 'adulto':
 				 $cod = $id.'-a';
 				 $tarifa = $detalle->precio_adulto_mayor;
 				 break;

 		 	default:
 		 		$cod = $id;
 				$tarifa = $detalle->tarifa_publica;
 		 		break;
 		 }


		}else {
			$detalle = $this->paquete_m->obtenerDetallePaquete($id);
			$fecha_reservacion = $detalle->fecha_salida;
			switch ($tipo_tarifa) {
 		 	case 'estandar':
 		 		$cod = $id.'-e';
 				$tarifa = $detalle->precio;
 		 		break;

 			case 'menor':
 			 	$cod = $id.'-m';
 				$tarifa = $detalle->precio_menor;
 			 	break;

 			case 'adulto':
 				 $cod = $id.'-a';
 				 $tarifa = $detalle->precio_adulto_mayor;
 				 break;

 		 	default:
 		 		$cod = $id;
 				$tarifa = $detalle->precio;
 		 		break;
 		 }

		}


		 $nombre_paquete = $this->input->post('nombre-paquete');
		 $especificaciones = $this->input->post('especificaciones');

		 $datos_item = array(
	          'id' => $cod,
	          'qty' => 1,
	          'price' => $tarifa,
	          'name' => $nombre_paquete,
	          'options' => array(
							'Especificaciones' => $especificaciones,
							'Tarifa' => $tipo_tarifa,
							'Tipo' => $tipo,
							'Fecha Reservación' => $fecha_reservacion,
						),
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
