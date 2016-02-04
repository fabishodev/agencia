<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h2>Lista <small>Categorias</small></h2>
      </div>
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
            <a href="<?php echo base_url();?>index.php/categoria/nueva" class="btn btn-success btn-sm pull-right">
              <span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Categoria
            </a>
            <br><br>
            <table class="table tbl-datatable" id="lista-categorias">
        				<thead>
        					<tr>
        						<th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
        						<th>Estatus</th>
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
        		                      <?php echo  $fila->id ?>
        		                    </td>
                                <td>
                                 <?php echo  $fila->nombre ?>
                               </td>
                               <td>
                                <?php echo  $fila->descripcion ?>
                              </td>
        		                    <td>
                                  <?php if ( $fila->estatus  == 1){ ?>
                                   <span class="label label-success"> Activo </span>
                                  <?php }else { ?>
                                    <span class="label label-danger"> No Activo</span>
                                 <?php }?>
        		                    </td>
                                <td>
                                 <?php echo  $fila->fecha_creado ?>
                               </td>
                               <td>
                                 <?php echo anchor('categoria/detalle/'.$fila->id,'Detalle', array('class'=>'btn btn-info btn-xs')) ?>
                               </td>
        		                  </tr>

        		                  <?php
        		                }
        		              }
                    		?>
        				</tbody>
        				<tfoot>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Estatus</th>
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
