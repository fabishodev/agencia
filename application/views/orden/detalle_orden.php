<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1>Detalle <small>Orden</small></h1>
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><?php echo anchor('admin/salir','Salir'); ?></li>

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
              <!--Fin barra de navegacion-->

    </div>
  </div>
  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <div class="col-md-4">

            <h2><?php echo $cabecero->id_orden; ?><small></small></h2>
            <p class="help-block">Id Orden</p>
            <h2>$<?php echo number_format($cabecero->total,2); ?><small></small></h2>
            <p class="help-block">Total</p>
          </div>
          <div class="col-md-4">
            <h2><?php echo $cabecero->nombre_completo; ?><small></small></h2>
            <p class="help-block">Cliente</p>
            <h2><?php echo $cabecero->correo; ?><small></small></h2>
            <p class="help-block">Correo</p>
            <h2><?php echo $cabecero->telefono; ?><small></small></h2>
            <p class="help-block">Telefono</p>
          </div>
          <div class="col-md-4">
            <h2><?php echo $cabecero->id_respuesta; ?><small></small></h2>
            <p class="help-block">Transaccion</p>
            <h2><?php echo $cabecero->autorizacion_respuesta; ?><small></small></h2>
            <p class="help-block">Autorizacion</p>
            <?php if ( $cabecero->status_respuesta  == 0){ ?>
             <h2><span class="label label-success"> Completada </span></h2>
            <?php }else { ?>
              <h2><span class="label label-danger"> Fallida</span></h2>
           <?php }?>
           <p class="help-block">Estatus</p>
          </div>
          </div>
        </div>
      </div>
    </div>
  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table tbl-datatable" id="lista-detalle">
        				<thead>
        					<tr>
        						<th>Nombre</th>
                    <th>Ciudad Lugar</th>
                    <th>Tipo</th>
                    <th>Tipo Tarifa</th>
                    <th>Persona(s)</th>
                    <th>Subtotal</th>
                    <th>Opciones</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php
        		              if ($detalle !== FALSE) {
        		                foreach ($detalle as $fila) {
        		                  ?>
        		                  <tr>
        		                    <td>
        		                      <?php echo  $fila->nombre ?>
        		                    </td>
                                <td>
                                  <?php echo  $fila->ciudad_lugar ?>
                                </td>
                                <td>
                                  <?php echo  ucfirst($fila->tipo_orden) ?>
                                </td>
                                <td>
                                  <?php echo  ucfirst($fila->tipo_tarifa) ?>
                                </td>
                                <td>
                                  <?php echo  $fila->cantidad ?>
                                </td>
                                <td>
                                  <?php echo  $fila->subtotal ?>
                                </td>
                                <td>
                                  <?php if ($fila->tipo_orden == 'tour'): ?>
                                    <?php echo anchor('tour/informacion/'.$fila->cod_paquete,'Ver', array('class'=>'btn btn-success btn-xs')) ?>
                                    <?php echo anchor('tour/detalle/'.$fila->cod_paquete,'Detalle', array('class'=>'btn btn-info btn-xs')) ?>
                                    <?php else: ?>
                                      <?php echo anchor('paquete/informacion/'.$fila->cod_paquete,'Ver', array('class'=>'btn btn-success btn-xs')) ?>
                                      <?php echo anchor('paquete/detalle/'.$fila->cod_paquete,'Detalle', array('class'=>'btn btn-info btn-xs')) ?>

                                  <?php endif; ?>
                                </td>
                              </tr>
                              <?php
        		                }
        		              }
                    		?>
        				</tbody>
        				<tfoot>
                  <th>Nombre</th>
                  <th>Ciudad Lugar</th>
                  <th>Tipo</th>
                  <th>Tipo Tarifa</th>
                  <th>Persona(s)</th>
                  <th>Subtotal</th>
                    <th>Opciones</th>
        				</tfoot>
        			</table>
              <p>
                <?php echo anchor('orden/lista','Regresar a Lista', array('class'=>'btn btn-primary ')); ?>

              </p>
          </div>

        </div>

      </div>
  </div>
</div>
<script>
  agencia.viajes.formato_tabla();
</script>
