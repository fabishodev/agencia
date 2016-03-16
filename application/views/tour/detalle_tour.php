<div class="modal fade" id="modal-add-img" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Agregar Imagen</h4>
      </div>
      <div class="modal-body">
        <form class="form-img-paquete form-validacion" action="<?php echo base_url();?>index.php/tour/agregarImagenTour/<?php echo $detalle->id ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" id="id-tour" name="id-tour" value="<?php echo $detalle->id ?>">
            <label for="upl">Imagen</label>
            <input type="file" id="upl" name="upl" required>
            <p class="help-block">Imagen del tour.</p>
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="btn btn-success">Guardar</button>
          </div>
        </div>
          </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
            <h2>Tour <small><?php echo $detalle->nombre_tour ?></small></h2>
        </div>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tours <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo anchor('tour/informacion/'.$detalle->id,'Ver') ?></li>
                    <li><?php echo anchor('tour/lista','Lista'); ?></li>
                    <li><?php echo anchor('tour/nuevo','Nuevo'); ?></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paquetes <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo anchor('paquete/lista','Lista'); ?></li>
                    <li><?php echo anchor('paquete/nuevo','Nuevo'); ?></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categoria <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo anchor('categoria/lista','Lista'); ?></li>
                    <li><?php echo anchor('categoria/nueva','Nueva'); ?></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operadoras <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo anchor('operadora/lista','Lista'); ?></li>
                    <li><?php echo anchor('operadora/nueva','Nueva'); ?></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ordenes <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo anchor('orden/lista','Lista'); ?></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mensajes <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo anchor('contacto/lista','Lista'); ?></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeria <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#" data-toggle="modal" data-target="#modal-add-img">Agregar Imagen</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><?php echo anchor('paquete/salir','Salir'); ?></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
                <!--Fin barra de navegacion-->
        <div class="panel panel-default">

          <div class="panel-body">
            <!--Notificaciones-->
            <?php if ($success != '') { ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $success ?></strong>
            </div>
            <?php $this->session->set_userdata('success', '');} ?>

            <?php if ($danger != '') { ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $danger ?></strong>
              </div>
            <?php $this->session->set_userdata('danger', '');} ?>
            <!---->
            <form class="form-validacion" action="<?php echo base_url();?>index.php/tour/editar/<?php echo $detalle->id;?>" method="post" enctype="multipart/form-data">


            <div class="col-sm-4">
              <div class="form-group">
      					<label for="estatus">Estatus</label>
      					<select class="form-control" id="estatus" name="estatus" required>
      						<?php if ($detalle->estatus == '1'): ?>
                    <option selected value="1">Activo</option>
        						<option value="0">No Activo</option>
                    <?php else: ?>
                      <option value="1">Activo</option>
                      <option selected value="0">No Activo</option>
                    <?php endif; ?>
                </select>
      				</div>
              <div class="form-group">
            <label for="sel-operadora" class="control-label">Operadora</label><br>
                <select class="form-control" id="sel-operadora" name="sel-operadora" required>
                  <option value="">Seleccione</option>
                  <?php foreach ($operadoras as $o) { ?>
                    <?php if ($o->id == $detalle->cod_operadora): ?>
                      <?php $seleccionado = "selected" ?>
                      <?php else: ?>
                        <?php $seleccionado = "" ?>
                    <?php endif; ?>
                    <option <?php echo $seleccionado ?> value="<?php echo $o->id;?>"><?php echo $o->nombre_operadora;?></option>
                  <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="nombre">Nombre Tour</label>
                <input type="text" class="form-control" id="nombre" name="nombre"  value="<?php echo $detalle->nombre_tour ?>" placeholder="" required>
                <p class="help-block">Nombre del tour.</p>
              </div>
              <div class="form-group">
                <label for="ciudad-lugar">Ciudad o Lugar</label>
                <input type="text" class="form-control" id="ciudad-lugar" name="ciudad-lugar" placeholder="" value="<?php echo $detalle->ciudad_lugar ?>" required>
                <p class="help-block">Ciudad o lugar del tour.</p>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" cols="40" required><?php echo $detalle->descripcion ?></textarea>
                <p class="help-block">Descripcion del tour.</p>
              </div>
              <div class="form-group">
                <label for="incluye">Incluye</label>
                <textarea name="incluye" id="incluye" class="form-control" rows="3" cols="40"><?php echo $detalle->incluye ?></textarea>
                <p class="help-block">Lo que incluye el del tour.</p>
              </div>
              <div class="form-group">
                <label for="todo-incluido">Todo Incluido </label>
                <select class="form-control" id="todo-incluido" name="todo-incluido" required>
                  <?php if ($detalle->todo_incluido == 'Si'): ?>
                    <option selected value="Si">Si</option>
                    <option value="No">No</option>
                    <?php else: ?>
                      <option value="Si">Si</option>
                      <option selected value="No">No</option>
                    <?php endif; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="resenia">Reseña</label>
                <textarea name="resenia" id="resenia" class="form-control" rows="3" cols="40" required><?php echo $detalle->resenia_historica ?></textarea>
                <p class="help-block">Reseña del tour.</p>
              </div>

              <div class="form-group">
                <label for="duracion">Duración</label>
                <input type="text" class="form-control" id="duracion" name="duracion" placeholder="" value="<?php echo $detalle->duracion ?>" required>
                <p class="help-block">Ejemplo: 1 día, 4 dias y 3 noches, etc.</p>
              </div>


            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="dia-salida">Dia(s) de Salida(s)</label>
                <input type="text" class="form-control" id="dia-salida" name="dia-salida" placeholder="" value="<?php echo $detalle->dias_salidas ?>" required>
                <p class="help-block">Ejemplo: Viernes, Sabados, Domingos</p>
              </div>
              <div class="form-group">
                <label for="horarios-salida">Horarios Salidas</label>
                <input type="text" class="form-control" id="horarios-salida" name="horarios-salida" value="<?php echo $detalle->horarios_salidas ?>" placeholder="" >
                <p class="help-block">Formato: HH:MM. Ejemplo: 12:00, 13:00, etc.</p>
              </div>
              <div class="form-group">
                <label for="lugar-salida">Lugar Salida</label>
                <input type="text" class="form-control" id="lugar-salida" name="lugar-salida" value="<?php echo $detalle->lugar_salida ?>" placeholder="" required>
                <p class="help-block">Punto de reunión de salida.</p>
              </div>
              <div class="form-group">
                <label for="hospedaje">Hospedaje </label>
                <input type="text" class="form-control" id="hospedaje" name="hospedaje" value="<?php echo $detalle->hospedaje_en ?>" placeholder="">
                <p class="help-block">Nombre del hotel</p>
              </div>
              <div class="form-group">
                <label for="politica-compra">Política de Compra</label>
                <textarea name="politica-compra" id="politica-compra" class="form-control" rows="3" cols="40"><?php echo $detalle->politica_compra ?></textarea>
                <p class="help-block">Política de compra del tour</p>
              </div>
              <div class="form-group">
                <label for="politica-cancelacion">Política de Cancelacion</label>
                <textarea name="politica-compra" id="politica-compra" class="form-control" rows="3" cols="40"><?php echo $detalle->politica_cancelacion ?></textarea>
                <p class="help-block">Política de compra del tour</p>
              </div>
              <div class="form-group">
                <label for="vigencia">Vigencia</label>
                <input type="text" class="form-control" id="vigencia" name="vigencia" placeholder="" value="<?php echo $detalle->vigencia ?>" required>
                <p class="help-block">Vigencia del tour.</p>
              </div>
            </div>
            <div class="col-sm-4">

              <div class="form-group">
                <label for="tarifa-publica">Tarifa Pública </label>
                <input type="text" class="form-control" id="tarifa-publica" name="tarifa-publica" placeholder="" value="<?php echo $detalle->tarifa_publica ?>" required>
                <p class="help-block">Tarifa publica del tour.</p>
              </div>
              <div class="form-group">
                <label for="tarifa-neta">Tarifa Neta </label>
                <input type="text" class="form-control" id="tarifa-neta" name="tarifa-neta" placeholder="" value="<?php echo $detalle->tarifa_neta ?>" required>
                <p class="help-block">Tarifa neta del tour.</p>
              </div>
              <div class="form-group">
                <label for="tarifa-impuestos">Tarifa Impuestos </label>
                <input type="text" class="form-control" id="tarifa-impuestos" name="tarifa-impuestos" placeholder="" value="<?php echo $detalle->tarifa_impuesto ?>" required>
                <p class="help-block">Tarifa impuestos del tour.</p>
              </div>
              <div class="form-group">
                <label for="precio-menor">Tarifa Menor </label>
                <input type="text" class="form-control" id="precio-menor" name="precio-menor" placeholder="" value="<?php echo $detalle->precio_menor?>" required>
                <p class="help-block">Tarifa menor de edad.</p>
              </div>
              <div class="form-group">
                <label for="precio-adulto">Tarifa Adulto Mayor </label>
                <input type="text" class="form-control" id="precio-adulto" name="precio-adulto" placeholder="" value="<?php echo $detalle->precio_adulto_mayor ?>" required>
                <p class="help-block">Tarifa adulto mayor.</p>
              </div>
              <div class="form-group">
      					<label for="denominacion">Denominación </label>
      					<select class="form-control" id="denominacion" name="denominacion" required>
                  <?php if ($detalle->denominacion == 'MX'): ?>
                    <option selected value="MX">MX</option>
        						<option value="USD">USD</option>
                    <?php else: ?>
                      <option value="MX">MX</option>
          						<option selected value="USD">USD</option>
                  <?php endif; ?>
                </select>
      				</div>

              <div class="form-group">
                <label for="nota">Nota</label>
                <textarea name="nota" id="nota" class="form-control" rows="3" cols="40"><?php echo $detalle->nota ?></textarea>
                <p class="help-block">Alguna nota.</p>
              </div>
              <div class="form-group">
                <label for="upl">Caratula</label>
                <input type="file" id="upl" name="upl">
                <p class="help-block">Caratula del Tour.</p>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" name="button" class="btn btn-success">Editar</button>
              <?php echo anchor('tour/lista/','Regresar a lista', array('class'=>'btn btn-primary')) ?>
            </div>
              </form>
          </div>

        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Galeria</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <?php if ($imagenes !== FALSE): ?>
                <?php foreach ($imagenes as $i): ?>
                <div class="col-sm-2">
                  <div class="thumbnail">
                    <a  class="thumbnail fancybox" rel="group" href="<?php echo base_url();?>img/galerias/<?php echo $i->imagen;?>">
                      <img src="<?php echo base_url() ?>img/galerias/<?php echo $i->imagen; ?>" alt="...">
                    </a>
                   <div class="caption">
                     <p>
                       <?php echo anchor('tour/eliminarImagenTour/'.$i->id,'Eliminar', array('class'=>'btn btn-danger btn-xs')) ?>
                     </p>
                   </div>
                 </div>
               </div>
             <?php endforeach; ?>
           <?php endif; ?>
          </div>
        </div>
      </div>
      </div>

    </div>

  </div>
</section>
<script>
$(".fancybox").fancybox({
    openEffect	: 'elastic',
      closeEffect	: 'elastic',
      helpers : {
      media : {}
    }
  });
  agencia.viajes.validar_formulario();
  $(document).ready(function () {
    $.datepicker.setDefaults($.datepicker.regional['es']);
  	$( "#vigencia" ).datepicker();
  });
</script>
