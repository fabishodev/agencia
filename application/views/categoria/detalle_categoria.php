<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h2>Detalle <small>Categoria</small></h2>
      </div>
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
          <form class="form-validacion" action="<?php echo base_url();?>index.php/categoria/editarCategoria/<?php echo $detalle->id  ?>" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
              <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $detalle->nombre ?>" required>
              </div>
              <div class="form-group">
                <label for="nombre">Descripción:</label>
                <textarea class="form-control" name="descripcion" rows="4" cols="40" required><?php echo $detalle->descripcion ?></textarea>
              </div>
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-success">Editar</button>
                <?php echo anchor('categoria/lista/','Regresar a lista', array('class'=>'btn btn-primary')) ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  agencia.viajes.validar_formulario();
</script>
