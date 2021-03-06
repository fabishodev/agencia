<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h2>Lista <small>Paquetes</small></h2>
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
                  <li><a href="#">Something else here</a></li>
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><?php echo anchor('paquete/salir','Salir'); ?></li>
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
            <a href="<?php echo base_url();?>index.php/paquete/nuevo" class="btn btn-success btn-sm pull-right">
              <span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Paquete
            </a>
            <br><br>
            <table class="table tbl-datatable" id="lista-categorias">
        				<thead>
        					<tr>
        						<th>Id</th>
                    <th>Paquete</th>
                    <th>Especificaciones</th>
                    <th>Lugar</th>
                    <th>Horarios</th>
        						<th>Estatus</th>
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
        		                      <?php echo  $fila->id ?>
        		                    </td>
                                <td>
                                 <?php echo  $fila->nombre_paquete ?>
                               </td>
                               <td>
                                <p>
                                  <?php echo  $fila->especificaciones ?>
                                </p>
                              <label for="">Precio:</label>
                                <p>

                                  <?php echo  $fila->precio ?> <?php echo  $fila->denominacion ?>
                                </p>
                              </td>
                              <td>
                               <p>
                                 <?php echo  $fila->lugar ?>
                               </p>
                               <label for="">Salida de:</label>
                               <p>
                                 <?php echo  $fila->lugar_salida ?>
                               </p>
                             </td>
                             <td>
                               <label for="">Fecha salida:</label>
                              <p>
                                <?php echo  $fila->fecha_salida ?>
                              </p>
                              <label for="">Hora</label>
                              <p>
                                <?php echo  $fila->hora_salida ?>
                              </p>
                              <label for="">Fecha regreso:</label>
                              <p>
                                <?php echo  $fila->fecha_regreso ?>
                              </p>
                              <label for="">Hora:</label>
                              <p>
                                <?php echo  $fila->hora_regreso ?>
                              </p>
                            </td>
        		                    <td>
                                  <?php if ( $fila->estatus  == 1){ ?>
                                   <span class="label label-success"> Activo </span>
                                  <?php }else { ?>
                                    <span class="label label-danger"> No Activo</span>
                                 <?php }?>
        		                    </td>
                               <td>
                                 <?php echo anchor('paquete/informacion/'.$fila->id,'Ver', array('class'=>'btn btn-primary btn-xs')) ?>
                                 <?php echo anchor('paquete/detalle/'.$fila->id,'Detalle', array('class'=>'btn btn-info btn-xs')) ?>
                               </td>
        		                  </tr>

        		                  <?php
        		                }
        		              }
                    		?>
        				</tbody>
        				<tfoot>
                  <th>Id</th>
                  <th>Paquete</th>
                  <th>Especificaciones</th>
                  <th>Lugar</th>
                  <th>Horarios</th>
                  <th>Estatus</th>
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
