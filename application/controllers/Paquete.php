<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paquete extends CI_Controller {

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

  public function eliminarImagen($id)
  {
      $img = $this->paquete_m->obtenerImagenPaquete($id);
      //echo '<pre>'; die(print_r($imagen));
      $cod_paq = $img->cod_paquete;
      if ($this->paquete_m->eliminarImagenPaquete($id)) {
          $nombre_archivo = $img->imagen;
          $archivo = 'img/galerias/'.$nombre_archivo;
          unlink($archivo);
          redirect('/paquete/detalle/'.$cod_paq);
      } else {
          $this->session->set_userdata('danger', 'No se pudo eliminar la imagen, intentelo de nuevo.');
          redirect('/paquete/detalle/'.$cod_paq);
      }
  }

  public function agregarImagenPaquete($id)
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
               redirect('paquete/detalle/'.$id);
           }
           if (!file_exists($archivo)) {
               if (move_uploaded_file($_FILES['upl']['tmp_name'], 'img/galerias/'.$_FILES['upl']['name'])) {
                 $imagen= $nombre_achivo;
               }else{
                 $this->session->set_userdata('danger', 'No se pudo agregar la imagen, intentelo de nuevo.');
                 redirect('paquete/detalle/'.$id);
               }
             }else{
               $this->session->set_userdata('danger', 'Ya existe un archivo con ese nombre, cambie el nombre al archivo e intentelo de nuevo.');
               redirect('paquete/detalle/'.$id);
             }
       }

       $cod_paquete = $id;
       $datos = array(
         'cod_paquete' => $id,
         'imagen' => $imagen,
         'cod_usuario' => 1,
         'fecha_creado' => date('Y-m-d H:i:s'),
      );

      if ($this->paquete_m->guardarImagenPaquete($datos,$id)) {
        redirect('paquete/detalle/'.$id);
      }else {
        $this->session->set_userdata('danger', 'No se pudo agregar la imagen, intentelo de nuevo.');
        redirect('paquete/detalle/'.$id);
      }


    redirect('paquete/detalle/'.$id);
  }

  public function nuevos()
  {
    $data = array();
    $data['contentView'] = 'paquete/nuevos_paquetes';
    $data['paquetes'] = $this->paquete_m->obtenerPaquetes();
    $data['scripts'] = array('agencia');
    $this->_renderView($data);
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
            redirect('/paquete/nuevo');
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
              redirect('/paquete/nuevo/');
            }

    }else {

      $caratula = $detalle->caratula_imagen;

    }


    $cod_categoria = $this->input->post('sel-categoria');
    $nombre = $this->input->post('nombre');
    $especificaciones = $this->input->post('especificaciones');
    $lugar = $this->input->post('lugar');
    $duracion = $this->input->post('duracion');
    $fecha_salida = $this->input->post('fecha-salida');
    $fecha_regreso = $this->input->post('fecha-regreso');
    $hora_salida = $this->input->post('hora-salida');
    $hora_regreso = $this->input->post('hora-regreso');
    $lugar_salida = $this->input->post('lugar-salida');
    $lugar_regreso = $this->input->post('lugar-regreso');
    $todo_incluido = $this->input->post('todo-incluido');
    $hospedaje_en = $this->input->post('hospedaje');
    $estatus = $this->input->post('estatus');
    $cod_hotel = NULL;
    $precio = $this->input->post('precio');
    $denominacion = $this->input->post('denominacion');
    $nota = $this->input->post('nota');
    $datos = array(
      'cod_categoria' => $cod_categoria,
      'nombre_paquete' => $nombre,
      'especificaciones' => $especificaciones,
      'lugar' => $lugar,
      'duracion' => $duracion,
      'fecha_salida' => date('Y-m-d',  strtotime($fecha_salida)),
      'hora_salida' => $hora_salida,
      'fecha_regreso' => date('Y-m-d',  strtotime($fecha_regreso)),
      'hora_regreso' => $hora_regreso,
      'lugar_salida' => $lugar_salida,
      'lugar_regreso' => $lugar_regreso,
      'todo_incluido' => $todo_incluido,
      'hospedaje_en' => $hospedaje_en,
      'cod_hotel' => $cod_hotel,
      'caratula_imagen' => $caratula,
      'precio' => $precio,
      'denominacion' => $denominacion,
      'nota' => $nota,
      'estatus' => $estatus,
      'cod_usuario' => 1,
      'fecha_actualizado' => date('Y-m-d H:i:s'),
    );
    if ($this->paquete_m->actualizarPaquete($datos,$id)) {
      $this->session->set_userdata('success', 'Paquete actualizado correctamente.');
      redirect('paquete/detalle/'.$id);
    }
  }

  public function informacion($id)
  {
    $data = array();
    $data['contentView'] = 'paquete/informacion_paquete';
    $data['detalle'] = $this->paquete_m->obtenerDetallePaquete($id);
    $data['imagenes'] = $this->paquete_m->obtenerGaleriaPaquete($id);
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

  public function detalle($id)
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $data = array();
    $data['contentView'] = 'paquete/detalle_paquete';
    $data['categorias'] = $this->categoria_m->obtenerListaCategorias();
    $data['detalle'] = $this->paquete_m->obtenerDetallePaquete($id);
    $data['imagenes'] = $this->paquete_m->obtenerGaleriaPaquete($id);
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

  public function agregarNuevo()
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
            redirect('/paquete/nuevo');
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
              redirect('/paquete/nuevo/');
            }
          }else{
            $this->session->set_userdata('danger', 'Ya existe un archivo con ese nombre, cambie el nombre al archivo e intentelo de nuevo.');
            redirect('/paquete/nuevo/');
          }
    }


    $cod_categoria = $this->input->post('sel-categoria');
    $nombre = $this->input->post('nombre');
    $especificaciones = $this->input->post('especificaciones');
    $lugar = $this->input->post('lugar');
    $duracion = $this->input->post('duracion');
    $fecha_salida = $this->input->post('fecha-salida');
    $fecha_regreso = $this->input->post('fecha-regreso');
    $hora_salida = $this->input->post('hora-salida');
    $hora_regreso = $this->input->post('hora-regreso');
    $lugar_salida = $this->input->post('lugar-salida');
    $lugar_regreso = $this->input->post('lugar-regreso');
    $todo_incluido = $this->input->post('todo-incluido');
    $hospedaje_en = $this->input->post('hospedaje');
    $cod_hotel = NULL;
    $precio = $this->input->post('precio');
    $denominacion = $this->input->post('denominacion');
    $nota = $this->input->post('nota');
    $datos = array(
      'cod_categoria' => $cod_categoria,
      'nombre_paquete' => $nombre,
      'especificaciones' => $especificaciones,
      'lugar' => $lugar,
      'duracion' => $duracion,
      'fecha_salida' => date('Y-m-d',  strtotime($fecha_salida)),
      'hora_salida' => $hora_salida,
      'fecha_regreso' => date('Y-m-d',  strtotime($fecha_regreso)),
      'hora_regreso' => $hora_regreso,
      'lugar_salida' => $lugar_salida,
      'lugar_regreso' => $lugar_regreso,
      'todo_incluido' => $todo_incluido,
      'hospedaje_en' => $hospedaje_en,
      'cod_hotel' => $cod_hotel,
      'caratula_imagen' => $caratula,
      'precio' => $precio,
      'denominacion' => $denominacion,
      'nota' => $nota,
      'estatus' => 1,
      'cod_usuario' => 1,
      'fecha_creado' => date('Y-m-d H:i:s'),
    );
    if ($this->paquete_m->guardarPaquete($datos)) {
      $this->session->set_userdata('success', 'Paquete guardado correctamente.');
      redirect('paquete/lista');
    }
  }

  public function nuevo()
  {
    if (!$this->session->userdata('correo') ) {
           $this->session->sess_destroy();
           redirect('admin/ingresar');
       }

    $data = array();
    $data['contentView'] = 'paquete/nuevo_paquete';
    $data['categorias'] = $this->categoria_m->obtenerListaCategorias();
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
    $data['contentView'] = 'paquete/lista_paquetes';
    $data['lista'] = $this->paquete_m->obtenerListaPaquetes();
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
    $data['contentView'] = 'paquete/index';
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
