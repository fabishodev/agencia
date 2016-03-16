<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1>Lista <small>Ordenes</small></h1>
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
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
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
            <!---->
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
            <table class="table tbl-datatable" id="lista-categorias">
        				<thead>
        					<tr>
        						<th>Orden</th>
                    <th>Datos Cliente</th>
                    <th>Total</th>
                    <th>Datos Transaccion</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php
        		              if ($lista !== FALSE) {
        		                foreach ($lista as $fila) {
        		                  ?>
        		                  <tr>
        		                    <td>
        		                      <?php echo  $fila->id_orden ?>
        		                    </td>
                                <td>
                                <label for="">Cliente:</label>
                                 <p>
                                   <?php echo  $fila->nombre.' '.$fila->ape_paterno.' '.$fila->ape_materno ?>
                                 </p>
                                 <label for="">Correo:</label>
                                 <p>
                                   <?php echo  $fila->correo ?>
                                 </p>
                                 <label for="">Telefono:</label>
                                 <p>
                                   <?php echo  $fila->telefono ?>
                                 </p>
                               </td>
                               <td>
                                $ <?php echo  number_format($fila->total,2) ?>
                              </td>
                               <td>
                                 <label for="">Respuesta:</label>
                                 <p>
                                   <?php echo  $fila->id_respuesta ?>
                                 </p>
                                 <label for="">Autorizacion:</label>
                                 <p>
                                   <?php echo  $fila->autorizacion_respuesta ?>
                                 </p>
                                 <label for="">Estatus:</label>
                                 <?php if ( $fila->status_respuesta  == 0){ ?>
                                  <span class="label label-success"> Completada </span>
                                 <?php }else { ?>
                                   <span class="label label-danger"> Fallida</span>
                                <?php }?>
                              </td>
                                <td>
                                 <?php echo  $fila->fecha_orden ?>
                               </td>
                               <td>
                                 <?php echo anchor('orden/detalle/'.$fila->id_orden,'Detalle', array('class'=>'btn btn-info btn-xs')) ?>
                               </td>
        		                  </tr>

        		                  <?php
        		                }
        		              }
                    		?>
        				</tbody>
        				<tfoot>
                  <th>Orden</th>
                  <th>Datos Cliente</th>
                  <th>Total</th>
                  <th>Datos Transaccion</th>
                  <th>Fecha</th>
                  <th>Opciones</th>
        				</tfoot>
        			</table>
          </div>

        </div>

      </div>
  </div>
</div>
<script>
  agencia.viajes.formato_tabla();
</script>
