<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends CI_Controller {

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
        $this->load->model('Tour_model', 'tour_m');
        $this->load->model('Categoria_model', 'categoria_m');
        $this->load->model('Operadora_model', 'operadora_m');
    }

   private $defaultData = array(
 		'title'			=> 'Agencia',
 		//'layout' 		=> 'layout/lytDefault',
    'layout' 		=> 'plantilla/lytDefault',
    'contentView' 	=> 'vUndefined',
 		'stylecss'		=> '',
 	  );

  private function _renderView($data = array())
  {
    $data = array_merge($this->defaultData, $data);
    $this->load->view($data['layout'], $data);
  }

  public function validarDiaSalida()
  {
    $id = $this->input->post('id');
    $fecha = $this->input->post('date');
    $day = date('w', strtotime($fecha));
    //echo '<pre>'; die(print($day));
    $dias = $this->tour_m->obtenerDiasSalidas($id);
    $array= array();
    $respuesta = array();
    foreach ($dias as $d) {
      array_push($array, $d->num_dia );
    }
    if (in_array($day, $array)) {
      $respuesta = array('respuesta' => 1);
    }else {
      $respuesta = array('respuesta' => 0);
    }


    echo json_encode($respuesta);
  }

  public function obtenerVigenciaTourJson()
  {
      $id = $this->input->post('id');
      $vigencia = $this->tour_m->obtenerVigenciaTour($id);
      echo json_encode($vigencia);
  }

  public function obtenerDisponibilidad(){
    $id = $this->input->post('id');
    $fecha = date('Y-m-d', strtotime($this->input->post('date')));
    $data = $this->tour_m->obtenerLugaresDisponibles($id, $fecha);
    //var_dump($data);
    echo json_encode($data);
  }

  public function tours()
  {
    $data = array();
    $data['contentView'] = 'tour/tours';
    $data['tours'] = $this->tour_m->obtenerTours();
    $data['scripts'] = array('agencia');
    $this->_renderView($data);
  }

  public function informacion($id)
  {
    $data = array();
    //$data['contentView'] = 'tour/informacion_paquete';
    $data['contentView'] = 'tour/informacion_tour_groovin';
    $data['detalle'] = $this->tour_m->obtenerDetalleTour($id);
    $data['imagenes'] = $this->tour_m->obtenerGaleriaTour($id);
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

  public function eliminarImagenTour($id)
  {
      $img = $this->tour_m->obtenerImagenTour($id);
      //echo '<pre>'; die(print_r($imagen));
      $cod_tour = $img->cod_tour;
      if ($this->tour_m->eliminarImagenTour($id)) {
          $nombre_archivo = $img->imagen;
          $archivo = 'img/galerias/'.$nombre_archivo;
          unlink($archivo);
          $this->session->set_userdata('success', 'Imagen eliminada correctamente.');
          redirect('/tour/detalle/'.$cod_tour);
      } else {
          $this->session->set_userdata('danger', 'No se pudo eliminar la imagen, intentelo de nuevo.');
          redirect('/tour/detalle/'.$cod_tour);
      }
  }

  public function agregarImagenTour($id)
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

       $allowed = array('png', 'jpg');
       $nombre_achivo = $_FILES['upl']['name'];
       $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
       $archivo = 'img/galerias/'.$nombre_achivo;
       if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {
           if (!in_array(strtolower($extension), $allowed)) {
               $this->session->set_userdata('danger', 'Extension no permitida.');
               redirect('tour/detalle/'.$id);
           }
           if (!file_exists($archivo)) {
               if (move_uploaded_file($_FILES['upl']['tmp_name'], 'img/galerias/'.$_FILES['upl']['name'])) {
                 $imagen= $nombre_achivo;
               }else{
                 $this->session->set_userdata('danger', 'No se pudo agregar la imagen, intentelo de nuevo.');
                 redirect('tour/detalle/'.$id);
               }
             }else{
               $this->session->set_userdata('danger', 'Ya existe un archivo con ese nombre, cambie el nombre al archivo e intentelo de nuevo.');
               redirect('tour/detalle/'.$id);
             }
       }

       $cod_tour = $id;
       $datos = array(
         'cod_tour' => $id,
         'imagen' => $imagen,
         'cod_usuario' => 1,
         'fecha_creado' => date('Y-m-d H:i:s'),
      );

      if ($this->tour_m->guardarImagenTour($datos,$id)) {
        $this->session->set_userdata('success', 'Imagen agregada correctamente.');
        redirect('tour/detalle/'.$id);
      }else {
        $this->session->set_userdata('danger', 'No se pudo agregar la imagen, intentelo de nuevo.');
        redirect('tour/detalle/'.$id);
      }


    redirect('tour/detalle/'.$id);
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

    $allowed = array('png', 'jpg');
    $nombre_achivo = $_FILES['upl']['name'];
    $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
    $detalle = $this->paquete_m->obtenerDetallePaquete($id);

    if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {
        if (!in_array(strtolower($extension), $allowed)) {
            $this->session->set_userdata('danger', 'Extension no permitida.');
            redirect('/tour/detalle/'.$id);
        }

        $archivo = 'img/caratulas/'.$nombre_achivo;

        if (file_exists($archivo)) {
          unlink($archivo);
        }

            if (move_uploaded_file($_FILES['upl']['tmp_name'], 'img/caratulas/'.$_FILES['upl']['name'])) {
              $config['image_library'] = 'gd2';
              $config['source_image'] = 'img/caratulas/'.$nombre_achivo;
              $config['create_thumb'] = FALSE;
              $config['maintain_ratio'] = TRUE;
              $config['width'] = 1280;
              $config['height'] = 440;
              $this->load->library('image_lib',$config);
              $this->image_lib->resize();
              $caratula = $nombre_achivo;
            }else{
              $this->session->set_userdata('danger', 'No se pudo agregar la imagen, intentelo de nuevo.');
            redirect('/tour/detalle/'.$id);
            }

    }else {

      $caratula = $detalle->caratula_imagen;

    }


    $cod_operadora = $this->input->post('sel-operadora');
    $nombre = $this->input->post('nombre');
    $ciudad_lugar = $this->input->post('ciudad-lugar');
    $descripcion = $this->input->post('descripcion');
    $incluye = $this->input->post('incluye');
    $todo_incluido = $this->input->post('todo-incluido');
    $resenia = $this->input->post('resenia');
    $duracion = $this->input->post('duracion');
    $dia_salida = $this->input->post('dia-salida');
    $horarios_salida = $this->input->post('horarios-salida');
    $lugar_salida = $this->input->post('lugar-salida');
    $hospedaje_en = $this->input->post('hospedaje');
    $politica_compra = $this->input->post('politica-compra');
    $politica_cancelacion = $this->input->post('politica-cancelacion');
    $vigencia = $this->input->post('vigencia');
    $tarifa_publica = $this->input->post('tarifa-publica');
    $tarifa_neta = $this->input->post('tarifa-neta');
    $tarifa_impuestos = $this->input->post('tarifa-impuestos');
    $precio_menor = $this->input->post('precio-menor');
    $precio_adulto = $this->input->post('precio-adulto');
    $vigencia = $this->input->post('vigencia');
    $cod_hotel = NULL;
    $denominacion = $this->input->post('denominacion');
    $nota = $this->input->post('nota');
    $estatus = $this->input->post('estatus');
    $min_reservaciones = $this->input->post('min-reservacion');
    $max_reservaciones = $this->input->post('max-reservacion');
    $dias = $this->input->post('dias');
    $datos = array(
      'cod_operadora' => $cod_operadora,
      'nombre_tour' => $nombre,
      'ciudad_lugar' => $ciudad_lugar,
      'descripcion' => $descripcion,
      'resenia_historica' => $resenia,
      'incluye' => $incluye,
      'duracion' => $duracion,
      'fecha_salida' => NULL,
      'hora_salida' => NULL,
      'fecha_regreso' => NULL,
      'hora_regreso' => NULL,
      'lugar_salida' => $lugar_salida,
      'lugar_regreso' => NULL,
      'todo_incluido' => $todo_incluido,
      'hospedaje_en' => $hospedaje_en,
      'cod_hotel' => $cod_hotel,
      'caratula_imagen' => $caratula,
      'tarifa_neta' => $tarifa_neta,
      'tarifa_impuesto' => $tarifa_impuestos,
      'tarifa_publica' => $tarifa_publica,
      'precio' => $tarifa_publica,
      'precio_menor' => $precio_menor,
      'precio_adulto_mayor' => $precio_adulto,
      'vigencia' => date('Y-m-d',  strtotime($vigencia)),
      'denominacion' => $denominacion,
      'estatus' => $estatus,
      'nota' => $nota,
      'dias_salidas' => $dia_salida,
      'horarios_salidas' => $horarios_salida,
      'min_reservaciones' => $min_reservaciones,
      'max_reservaciones' => $max_reservaciones,
      'cod_usuario' => 1,
      'fecha_actualizado' => date('Y-m-d H:i:s'),
    );

    if ($this->tour_m->actualizarTour($datos,$id)) {
      if ($this->tour_m->eliminarDiasSalidas($id)) {
        foreach ($dias as $dia) {
          switch ($dia) {
            case 'Domingo':
              $num_dia = 0;
              break;
            case 'Lunes':
              $num_dia = 1;
              break;
            case 'Martes':
              $num_dia = 2;
              break;
            case 'Miércoles':
              $num_dia = 3;
              break;
            case 'Jueves':
              $num_dia = 4;
              break;
            case 'Viernes':
              $num_dia = 5;
              break;
            case 'Sábado':
              $num_dia = 6;
              break;
            default:
              $num_dia = NULL;
              break;
          }
          $dia_salida = array(
            'cod_tour' => $id,
            'dia_semana' => $dia,
            'num_dia' => $num_dia,
            'cod_usuario' => 1,
            'fecha_creado' => date('Y-m-d H:i:s'),
          );
          $this->tour_m->guardarDiaSalida($dia_salida);
        }
      }
      $this->session->set_userdata('success', 'Tour actualizado correctamente.');
      redirect('tour/detalle/'.$id);
    }
  }

  public function detalle($id)
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $data = array();
    $data['contentView'] = 'tour/detalle_tour';
    $data['layout'] = 'layout/lytDefault';
    $data['categorias'] = $this->categoria_m->obtenerListaCategorias();
    $data['operadoras'] = $this->operadora_m->obtenerListaOperadoras();
    $data['detalle'] = $this->tour_m->obtenerDetalleTour($id);
    $data['imagenes'] = $this->tour_m->obtenerGaleriaTour($id);
    $data['dias'] = $this->tour_m->obtenerDiasSalidas($id);
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
    //var_dump($data['dias']);
    $this->_renderView($data);
  }

  public function agregar()
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $allowed = array('png', 'jpg');
    $nombre_achivo = $_FILES['upl']['name'];
    $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
    $archivo = 'img/caratulas/'.$nombre_achivo;
    if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {
        if (!in_array(strtolower($extension), $allowed)) {
            $this->session->set_userdata('danger', 'Extension no permitida.');
            redirect('/tour/nuevo');
        }
        if (!file_exists($archivo)) {
            if (move_uploaded_file($_FILES['upl']['tmp_name'], 'img/caratulas/'.$_FILES['upl']['name'])) {
              $config['image_library'] = 'gd2';
              $config['source_image'] = 'img/caratulas/'.$nombre_achivo;
              $config['create_thumb'] = TRUE;
              $config['maintain_ratio'] = TRUE;
              $config['width'] = 1280;
              $config['height'] = 440;
              $this->load->library('image_lib',$config);
              $this->image_lib->resize();
              $caratula = $nombre_achivo;
            }else{
              $this->session->set_userdata('danger', 'No se pudo agregar la imagen, intentelo de nuevo.');
              redirect('/tour/nuevo/');
            }
          }else{
            $this->session->set_userdata('danger', 'Ya existe un archivo con ese nombre, cambie el nombre al archivo e intentelo de nuevo.');
            redirect('/tour/nuevo/');
          }
    }


    $cod_operadora = $this->input->post('sel-operadora');
    $nombre = $this->input->post('nombre');
    $ciudad_lugar = $this->input->post('ciudad-lugar');
    $descripcion = $this->input->post('descripcion');
    $incluye = $this->input->post('incluye');
    $todo_incluido = $this->input->post('todo-incluido');
    $resenia = $this->input->post('resenia');
    $duracion = $this->input->post('duracion');
    $dia_salida = $this->input->post('dia-salida');
    $horarios_salida = $this->input->post('horarios-salida');
    $lugar_salida = $this->input->post('lugar-salida');
    $hospedaje_en = $this->input->post('hospedaje');
    $politica_compra = $this->input->post('politica-compra');
    $politica_cancelacion = $this->input->post('politica-cancelacion');
    $vigencia = $this->input->post('vigencia');
    $tarifa_publica = $this->input->post('tarifa-publica');
    $tarifa_neta = $this->input->post('tarifa-neta');
    $tarifa_impuestos = $this->input->post('tarifa-impuestos');
    $precio_menor = $this->input->post('precio-menor');
    $precio_adulto = $this->input->post('precio-adulto');
    $vigencia = $this->input->post('vigencia');
    $cod_hotel = NULL;
    $denominacion = $this->input->post('denominacion');
    $nota = $this->input->post('nota');
    $min_reservaciones = $this->input->post('min-reservacion');
    $max_reservaciones = $this->input->post('max-reservacion');
    $dias = $this->input->post('dias');
    $datos = array(
      'cod_categoria' => 4,
      'cod_operadora' => $cod_operadora,
      'nombre_tour' => $nombre,
      'ciudad_lugar' => $ciudad_lugar,
      'descripcion' => $descripcion,
      'resenia_historica' => $resenia,
      'incluye' => $incluye,
      'duracion' => $duracion,
      'fecha_salida' => NULL,
      'hora_salida' => NULL,
      'fecha_regreso' => NULL,
      'hora_regreso' => NULL,
      'lugar_salida' => $lugar_salida,
      'lugar_regreso' => NULL,
      'todo_incluido' => $todo_incluido,
      'hospedaje_en' => $hospedaje_en,
      'cod_hotel' => $cod_hotel,
      'caratula_imagen' => $caratula,
      'tarifa_neta' => $tarifa_neta,
      'tarifa_impuesto' => $tarifa_impuestos,
      'tarifa_publica' => $tarifa_publica,
      'precio' => $tarifa_publica,
      'precio_menor' => $precio_menor,
      'precio_adulto_mayor' => $precio_adulto,
      'vigencia' => date('Y-m-d',  strtotime($vigencia)),
      'denominacion' => $denominacion,
      'estatus' => 1,
      'nota' => $nota,
      'dias_salidas' => $dia_salida,
      'horarios_salidas' => $horarios_salida,
      'min_reservaciones' => $min_reservaciones,
      'max_reservaciones' => $max_reservaciones,
      'cod_usuario' => 1,
      'fecha_creado' => date('Y-m-d H:i:s'),
    );
    $cod_tor = $this->tour_m->guardarTour($datos);
    if ($cod_tour) {
      foreach ($dias as $dia) {
        switch ($dia) {
          case 'Domingo':
            $num_dia = 0;
            break;
          case 'Lunes':
            $num_dia = 1;
            break;
          case 'Martes':
            $num_dia = 2;
            break;
          case 'Miércoles':
            $num_dia = 3;
            break;
          case 'Jueves':
            $num_dia = 4;
            break;
          case 'Viernes':
            $num_dia = 5;
            break;
          case 'Sábado':
            $num_dia = 6;
            break;
          default:
            $num_dia = NULL;
            break;
        }
        $dia_salida = array(
          'cod_tour' => $cod_tour,
          'dia_semana' => $dia,
          'num_dia' => $num_dia,
          'cod_usuario' => 1,
          'fecha_creado' => date('Y-m-d H:i:s'),
        );
        $this->tour_m->guardarDiaSalida($dia_salida);
      }
      $this->session->set_userdata('success', 'Tour guardado correctamente.');
      redirect('tour/lista');
    }
  }

  public function nuevo()
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $data = array();
    $data['contentView'] = 'tour/nuevo_tour';
    $data['layout'] = 'layout/lytDefault';
    $data['operadoras'] = $this->operadora_m->obtenerListaOperadoras();
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
    $data['contentView'] = 'tour/lista_tours';
    $data['layout'] = 'layout/lytDefault';
    $data['lista'] = $this->tour_m->obtenerListaTours();
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
